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
    
    public function scouts() {
        return $this->belongsToMany('Scout', 'award_scout', 'scout_id')
                ->withPivot('date_completed', 'approver_id');
    }
}

