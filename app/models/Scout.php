<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Scout extends Person {
    
    public function ranks() {
        $this->belongsToMany('Rank');
    }
    
}