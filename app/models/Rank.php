<?php

class Rank extends Award {
    
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
        
        protected $fillable = array(
                'rank_sort_sequence',
            );
        
        protected $guarded = array();
        
        public static $validation_rules = array(
            'rank_sort_sequence' => 'required:integer',
        );
        
        public static $validation_messages = array(
            
        );
        
        public $autoPurgeRedundantAttributes = true;   
        
        /*public function getApproverNameAttribute() {
            if ( !is_null($this->pivot->approver_last_name) ) {
                return $this->pivot->approver_first_name . ' ' . $this->pivot->approver_last_name;
            } else {
                return 'N/A';
            }
        }*/
    
    public function scouts() {
        return $this->hasMany('Scout', 'award_scout', 'award_id', 'scout_id');
    }
}

