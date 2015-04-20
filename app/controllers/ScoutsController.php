<?php

//use storage\person\PersonRepository as Scout;

class ScoutsController extends \BaseController {
    
        //public function __construct(Scout $scout) {
        //    $this->scout = $scout;
        //}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //return $this->scout->all();
            return Scout::all();
            //$this->layout->content = View::make('scouts.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return Redirect::route('persons.create', array('Scout'));
            
            //$this->layout->content = View::make('scouts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Scout $scout)
	{
            $rankList = self::buildRankList($scout);
            
            $this->layout->content = View::make('scouts.ranks.show', compact('scout', 'rankList'))
                    ->with(array('page_title' => 'Scout Details',
                            'award_type' => 'Rank'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        public function coh() {
            
        }
        
        public function search() {
            
        }
        
        public function rank(Scout $scout) {
            
        }
        
        private function buildRankList(Scout $scout) {
            $rankList = new \Illuminate\Support\Collection();
            //$rankList->
            
            $allRanks = Rank::where('id', '>', 0)->orderBy('rank_sort_sequence', 'ASC')->get();
            $scoutRanks = $scout->ranks;  //->sortBy('rank_sort_sequence', 'ASC');
            
            for ( $i = $scoutRanks->count() + 1; $i <= $allRanks->count(); $i++ ) {
                $scoutRanks->put($i, 
                        // Use Laravel Collection object 'filter' method to get appropriate instance.
                        // See http://stackoverflow.com/questions/20931020/laravel-get-object-from-collection-by-attribute.
                        $allRanks->filter( function($item) use ($i) {
                            return $item->id == $i;
                        })->first()
                        );
                
                /*
                if ( $scout->ranks[$i]->id == $allRanks[$i]->id ) {
                    $rankList->put($i, $scoutRanks[$i]);
                } else {
                    $rankList->put($i, $allRanks[$i]);
                }*/
            }
            
            return $scoutRanks;
        }
        
        private function getAllRanksList() {
            $allRanksList = array();
            $allRanks = Rank::where('id', '>', 0)->orderBy('rank_sort_sequence', 'ASC')->get();
            
            foreach ( $allRanks as $rank ) {
                $allRanksList[$rank->id] = $rank->award_name;
            }
            
            return $allRanksList;
        }


}
