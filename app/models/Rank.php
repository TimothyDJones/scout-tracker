<?php

class Rank extends Award {
    
    public function scouts() {
        return $this->belongsToMany('Scout', 'rank_scout', 'scout_id');
    }
}

