<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Adult extends Person {
    
    public function scouts() {
        return $this->belongsToMany('Scout', 'adult_scout', 'scout_id');
    }
    
    
}