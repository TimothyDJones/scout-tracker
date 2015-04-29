<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Scout extends Person {
    
    public function ranks() {
        return $this->belongsToMany('Rank', 'award_scout', 'scout_id', 'award_id')
                ->withPivot('date_completed', 'approver_id', 'date_board_of_review', 'date_sm_conf', 'award_status', 'id')
                ->join('persons AS approver', 'approver_id', '=', 'approver.id')
                ->select('awards.*', 'date_completed', 'approver_id', 
                        'date_board_of_review', 'date_sm_conf', 'award_status',
                        'approver.last_name AS pivot_approver_last_name',
                        'approver.first_name AS pivot_approver_first_name',
                        'award_scout.id AS pivot_id'); 
    }
    
    public function meritBadges() {
        return $this->hasMany('MeritBadge', 'award_scout', 'award_id')
                ->withPivot('date_completed', 'approver_id', 'date_started', 'award_status');        
    }
    
    public function rankRequirements() {
        return $this->belongsToMany('RankRequirement', 'requirement_scout', 'scout_id', 'reqt_id')
                ->withPivot('date_completed', 'approver_id')
                ->join('persons AS approver', 'approver_id', '=', 'approver.id')
                ->join('awards AS rank', 'award_id', '=', 'rank.id')
                ->select('awards_requirements.*', 'date_completed', 'approver_id', 
                        'approver.last_name AS pivot_approver_last_name',
                        'approver.first_name AS pivot_approver_first_name',
                        'rank.award_name AS pivot_rank_name'); 
    }
    
    public function adults() {
        return $this->hasMany('Adult', 'adult_scout', 'adult_id');
    }
    
    /**
     * Return the current rank of this Scout.
     * Returns empty Rank model instance if nothing found.
     * 
     * @return Rank model instance
     */
    public function currentRank() {
        $result = DB::table('award_scout')
                ->where('scout_id', '=', $this->id)
                ->whereIn('award_status', array('Completed', 'Presented'))
                ->join('awards', 'award_id', '=', 'awards.id')
                ->where('awards.award_class_name', '=', 'Rank')
                ->selectRaw('MAX(`awards`.`id`) AS award_id')
                ->pluck('award_id');
        // Update above query to use "pluck()" method.
        // See http://www.reddit.com/r/laravel/comments/31yxhg/help_with_an_eloquent_query/cqbw6sh.
        
        $rank = new Rank();
        $rank = Rank::find($result);
        
        Log::debug('Scout::currentRank() query result: ' . print_r($result, TRUE));
        
        if ( !empty($rank->id) ) {
            return $rank;
        } else {
            return new Rank();
        }
    }
    
    /**
     * Return the next rank of this Scout.
     * Uses the currentRank() method.
     * Returns empty Rank model instance if nothing found.
     * 
     * @return Rank model instance
     */
    public function nextRank() {
        $currentRank = self::currentRank();
        $nextRank = Rank::where('rank_sort_sequence', '=', ($currentRank->rank_source_sequence + 1) )
                        ->get()->first();
        
        Log::debug('Scout::nextRank() query result: ' . print_r($nextRank, TRUE));
        
        if ( !empty($nextRank->id) ) {
            return $nextRank;
        } else {
            return new Rank();
        }
    }
}