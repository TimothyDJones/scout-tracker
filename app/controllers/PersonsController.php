<?php

//use storage\person\PersonRepository as Person;

class PersonsController extends \BaseController {
    
        //public function __construct(Person $person) {
        //    $this->person = $person;
        //}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //return $this->person->all();
            //return Person::all();
            if ( Utility::isAdminUser() ) {
                $query = Person::orderBy('class_name', 'ASC')
                        ->orderBy('last_name', 'ASC');
                $persons = $query->remember(5)->get();
                
                $this->layout->content = View::make('persons.index', compact('persons'))
                        ->with(array('page_title' => 'All Persons', ));
            } elseif ( Auth::guest() ) {
                return Redirect::route('login');
            } else {
                return Redirect::route('profile', array('id' => Auth::user()->id));
            }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $personClass = Input::get('class_name');
            if ( !$personClass ) $personClass = 'Scout';
            // Get list of addresses to display.
            $addresses = Address::selectList();
            $this->layout->content = View::make('persons.create', 
                    array('class_name' => $personClass, 
                        'updateFlag' => FALSE, 
                        'addressList' => $addresses)
                    );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $input = array_except(Input::all(), array('class_name', 'admin_ind'));
            
            // We must has *BOTH* 'password' and 'password_confirmation' so that validator works!
            //$input['password'] = Hash::make($input['password']);
            //$input['password_confirmation'] = Hash::make($input['password_confirmation']);
            
            $validation_rules = Person::$validation_rules;
            // If the currently logged in user is admin, then password
            // verification is not required.
            if ( Utility::isAdminUser() ) {
                $validation_rules = array_except(Person::$validation_rules, array('password', 'password_confirmation'));
                $input['password'] = 'password';    // Set default password to 'password'.
            }
            $validator = Validator::make($input, $validation_rules);
            
            if ( $validator->passes() ) {
                unset($input['password_confirmation']);     // Remove password confirmation field from array.
                
                if ( isset($input['password']) ) {
                    // Hash password before saving.
                    $input['password'] = Hash::make($input['password']);
                }
                
                $class_name = Input::get('class_name');
                switch ($class_name) {
                    case 'Adult':
                        $person = new Adult($input);
                        $person->admin_ind = Input::get('admin_ind');
                        break;
                    case 'Scout':
                        $person = new Scout($input);
                        $person->admin_ind = FALSE;
                        break;
                    default:        // 'Scout' is default.
                        $input['class_name'] = 'Scout';
                        $person = new Scout($input);
                        $person->admin_ind = FALSE;
                }                
                
                // We "force" the save, because we have already done validation above.
                if ( $person->forceSave() ) {
                    $message = 'New ' . $class_name . ' "' . $person->first_name . ' ' . $person->last_name . '" created.';
                    return Redirect::route('profile', array($person->id))->with(array('message' => $message));
                }
            } else {  // If validation fails, redirect to previous page.
                return Redirect::route('persons.create')
                        ->withInput()
                        ->withErrors( $validator->errors() )
                        ->with(array('message' => 'Validation error.', 'updateFlag' => FALSE));                
            }
            

            

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Person $person = NULL)
	{
            if ( !$person ) {
                $person = Person::find(Auth::id());
            }
            
            return $person;
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
        
        public function login() {
            $this->layout->content = View::make('persons.login');
        }
        
        public function authenticate() {
            
            if ( Auth::check() ) {
                return Redirect::route('profile');
            } elseif ( Request::isMethod('post') ) {
                $loginValidator = Validator::make(Input::all(), array(
                    'email_address' => 'required',
                    'password' => 'required',
                ));
                
                if ( $loginValidator->passes() ) {
                    $inputCredentials = array(
                        'email_address' => Input::get('email_address'),
                        'password' => Input::get('password'),
                    );
                    
                    if ( Auth::attempt($inputCredentials) ) {
                        $person = Person::find(Auth::id());
                        if ( $person->admin_ind ) {
                            Session::put('AdminUser', TRUE);
                        }
                        return Redirect::intended('profile', array('id' => $person->id))->with('message', 'Login successful.');
                    }
                    
                    return Redirect::back()->withInput()->withErrors( array('password' => array('Credentials invalid.')) );
                } else {
                    return Redirect::back()->withInput()->withErrors($loginValidator);
                }
            }            
        }


}
