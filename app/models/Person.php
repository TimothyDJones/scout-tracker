<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Person extends \BaseModel
        implements UserInterface, RemindableInterface {

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'persons';
        
        /**
         * The name of the column in database table for storing the class name.
         * 
         * @var string
         */
        protected $stiClassField = 'class_name';
        
        /**
         * The name of the base class used for single-table inheritance.
         * Typically, this will be the name of *this* class, but could
         * be different, if you have multiple levels of inheritance.
         * 
         * @var string
         */
        protected $stiBaseClass = 'Person';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        protected $fillable = array('last_name', 'first_name', 'bsa_id', 'primary_phone', 
            'secondary_phone', 'email_address', 'password', 'password_confirmation',
            'address_id');
        
        protected $guarded = array();
        
        public static $validation_rules = array(
            'last_name'         => 'required',
            'first_name'        => 'required',
            'bsa_id'            => 'integer',
            //'primary_phone'     => 'phone',
            //'secondary_phone'   => 'phone',
            'email_address'     => 'required|email|min:5|unique:persons,email_address',
            'password'          => 'required|different:email_address|confirmed',        // *** Ardent technique for password confirmation validation!
            'password_confirmation' => 'required|different:email_address',
        );
        
        public $autoPurgeRedundantAttributes = true;
        
        /**
         * Mutators for proper capitalization of names.
         */
        public function setFirstNameAttribute($value) {
            $this->attributes['first_name'] = ucwords($value);
        }
        
        public function setLastNameAttribute($value) {
            $this->attributes['last_name'] = ucwords($value);
        }
        
        public function setEmailAddress($value) {
            $this->attributes['email_address'] = strtolower($value);
        }
        
        public function address() {
            return $this->belongsTo('Address');
        }
        
        public function getAuthIdentifier() {
            return $this->getKey();
        }
        
        public function getAuthPassword() {
            return $this->password;
        }
        
        public function getRememberToken() {
            return $this->remember_token;
        }
        
        public function setRememberToken($value) {
            $this->remember_token = $value;
        }
        
        public function getRememberTokenName() {
            return "remember_token";
        }
        
        public function getReminderEmail() {
            return $this->email;
        }

}
