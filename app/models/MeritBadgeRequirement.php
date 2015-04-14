<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MeritBadgeRequirement extends AwardRequirement {
    
        public function meritBadge() {
		return $this->belongsTo('MeritBadge');
	}
}