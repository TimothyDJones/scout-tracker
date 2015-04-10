<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MeritBadge extends Award {
    
        public static $rules = array(
            'eagle_reqd_ind' => 'required',            
        );
	
	public function primaryCounselor() {
		return $this->belongsTo('Adult', 'primary_counselor_id');
	}
        
        public function meritBadgeRequirements() {
            return $this->hasMany('MeritBadgeRequirement');
        }
        
        public function scouts() {
            return $this->belongsToMany('Scout', 'award_scout', 'scout_id');
        }

}