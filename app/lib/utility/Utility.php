<?php

class Utility {
    
    	/**
	 * Check to see if currently logged on user or specific user (customer)
         * is an administrative user (Person::admin_ind == TRUE).
	 *
	 * @param  Person $person (optional)
	 * @return Boolean
	 */            
        public static function isAdminUser(Person $person = NULL) {
            
            // If no user passed in, then use the currently logged on user.
            if ( is_null($person) ) {
                // Scouts are *NEVER* administrators!
                if ( Auth::check() && Auth::user()->class_name == 'Scout' ) {
                    return false;
                }
                return (Auth::check() && Auth::user()->admin_ind);
            } else {
                return (Person::find($person->id)->admin_ind);
            }
        }
    
}

