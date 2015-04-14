<?php //namespace ;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AwardRequirement extends \LaravelBook\Ardent\Ardent {
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'awards_requirements';    
    
        public static $rules = array(
            'award_id'    => 'required',
            'award_identifier' => 'required',
            'award_details' => 'required',
            'award_identifer_sort_seq' => 'numeric',            
        );

	protected $fillable = array('award_id', 'award_identifier',
            'award_details', 'award_identifer_sort_seq',);
	
	public function award() {
		return $this->belongsTo('Award', 'award_id');
	}


}

