<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends \LaravelBook\Ardent\Ardent {
    
        protected $table = 'addresses';
        
        protected $fillable = array(
            'addr1', 'addr2', 'city', 'state', 'postal_code', 
            'country', 
        );
        
        protected $guarded = array();
        
        public static $rules = array(
            'addr1'             => 'required|min:5',
            'city'              => 'required',
            'state'             => 'required',
            'postal_code'       => 'required',
            'country'           => 'alpha|size:3',
        );
        
	public function persons() {
		return $this->hasMany('Person');
	}
        
        /**
         * Mutators for proper capitalization of names.
         */
        public function setAddr1Attribute($value) {
            $this->attributes['addr1'] = ucwords($value);
        }
        
        public function setAddr2Attribute($value) {
            $this->attributes['addr2'] = ucwords($value);
        }
        
        public function setStateAttribute($value) {
            $this->attributes['state'] = ucwords($value);
        }
        
        public function setCityAttribute($value) {
            $this->attributes['city'] = ucwords($value);
        }
        
        public function setCountryAttribute($value) {
            $this->attributes['country'] = strtoupper($value);
        }
        
        /**
         * Returns an array list of *ALL* addresses
         * keyed to address ID (primary key) for use in drop-down list.
         * 
         * @return array
         */
        public static function selectList() {
            $addresses = array();
            
            foreach ( Address::all() as $address ) {
                $addrLine = $address->addr1 . ', ';
                $addrLine .= $address->city . ', ' . $address->state . ' ' . $address->postal_code;
                $addresses[$address->id] = $addrLine;
            }
            
            return $addresses;
        }
        
        
        /**
         * Format address as HTML wrapped as paragraph.
         * 
         * @param Address $address
         * @return string
         */
        public static function toHtml(Address $address = NULL) {
            if ( is_null($address) ) {
                if ( Auth::check() ) {
                    $address = Auth::user()->address;
                } else {
                    return '<p></p>';
                }
            }
            
            $addr = '<p>' . self::formatAddress($address, '<br />') . '</p>';
            
            return $addr;
        }
        
        /**
         * Format address for printing or display, including line breaks.
         * 
         * @param Address $address
         * @param string $separator
         * @return string
         */
        public static function formatAddress(Address $address, $separator = PHP_EOL) {
            $addr = $address->addr1 . $separator;
            if ( strlen($address->addr2) ) {
                $addr .= $address->addr2 . $separator;
            }
            $addr .= $address->city . ', ' . $address->state . ' ' . $address->postal_code . $separator;
            if ( strlen($address->country) ) {
                $addr .= $address->country . $separator;
            }
            
            return $addr;
        }
        
        
}