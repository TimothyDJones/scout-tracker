<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Scout extends Person {
    
    public function ranks() {
        return $this->belongsToMany('Rank', 'award_scout', 'scout_id', 'award_id')
                ->withPivot('date_completed', 'approver_id')
                ->join('persons AS approver', 'approver_id', '=', 'approver.id')
                ->select('awards.*', 'date_completed', 'approver_id', 
                        'approver.last_name AS pivot_approver_last_name',
                        'approver.first_name AS pivot_approver_first_name'); 
    }
    
    public function meritBadges() {
        return $this->hasMany('MeritBadge', 'award_scout', 'award_id')
                ->withPivot('date_completed', 'approver_id');        
    }
    
    public function adults() {
        return $this->hasMany('Adult', 'adult_scout', 'adult_id');
    }
}