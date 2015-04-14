<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Scout extends Person {
    
    public function ranks() {
        return $this->belongsToMany('Rank', 'award_scout', 'scout_id', 'award_id')
                ->withPivot('date_completed', 'approver_id', 'date_board_of_review', 'date_sm_conf', 'award_status')
                ->join('persons AS approver', 'approver_id', '=', 'approver.id')
                ->select('awards.*', 'date_completed', 'approver_id', 
                        'approver.last_name AS pivot_approver_last_name',
                        'approver.first_name AS pivot_approver_first_name'); 
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
    
    public function currentRank() {
        $result = DB::table('award_scout')
                ->where('scout_id', '=', $this->id)
                ->whereIn('award_status', array('Completed', 'Presented'))
                ->join('awards', 'award_id', '=', 'awards.id')
                ->where('awards.award_class_name', '=', 'Rank')
                ->select('awards.id AS award_id', 'awards.award_name');
        
    }
}