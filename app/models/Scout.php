<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Scout extends Person {
    
    public function ranks() {
        return $this->belongsToMany('Rank', 'rank_scout', 'rank_id');
    }
    
    public function adults() {
        return $this->belongsToMany('Adult', 'adult_scout', 'adult_id');
    }
}