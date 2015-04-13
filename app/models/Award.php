<?php

class Award extends \BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'awards';
        
        /**
         * The name of the column in database table for storing the class name.
         * 
         * @var string
         */
        protected $stiClassField = 'award_class_name';
        
        /**
         * The name of the base class used for single-table inheritance.
         * Typically, this will be the name of *this* class, but could
         * be different, if you have multiple levels of inheritance.
         * 
         * @var string
         */
        protected $stiBaseClass = 'Award';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
        
        protected $fillable = array(
            'award_class_name', 
            'award_name', 
            'reqts_last_changed_year',
            'award_image', 
            'merit_badge_org_url',
            );
        
        protected $guarded = array();
        
        public static $validation_rules = array(
            'award_name' => 'required',
            'reqts_last_changed_year' => 'required:integer',
            'merit_badge_org_url' => 'url',
        );
        
        public static $validation_messages = array(
            
        );
        
        public $autoPurgeRedundantAttributes = true;
        
        
}

