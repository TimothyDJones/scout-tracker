<?php

class RankRequirement extends AwardRequirement {
    
    
    public function rank() {
        return $this->belongsTo('Rank', 'award_id');
    }
}

