<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Scout extends Person {
    
    public function ranks() {
        return $this->hasMany('Rank', 'award_scout', 'award_id')
                ->withPivot('date_completed', 'approver_id');
    }
    
    public function meritBadges() {
        return $this->hasMany('MeritBadge', 'award_scout', 'award_id')
                ->withPivot('date_completed', 'approver_id');        
    }
    
    public function adults() {
        return $this->hasMany('Adult', 'adult_scout', 'adult_id');
    }
}