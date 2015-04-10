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
	public function show($id)
	{
		//
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
            $rankList->
            
            $allRanks = Rank::all()->orderBy('rank_sort_sequence', 'ASC');
            $scoutRanks = $scout->ranks->sortBy('rank_sort_sequence', 'ASC');
            
            for ( $i = $scoutRanks->count(); $i < $allRanks->count(); $i++ ) {
                if ( $scout->ranks->id == $rank->id ) {
                    
                }
            }
        }


}
