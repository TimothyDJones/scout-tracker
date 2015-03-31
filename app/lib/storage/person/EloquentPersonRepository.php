<?php namespace storage\person;

use Person;

class EloquentPersonRepository implements \storage\person\PersonRepository {
    
    public function all() {
        return Person::all();
    }
    
    public function find($id) {
        return Person::find($id);
    }
    
    public function add($input) {
        return Person::create($input);
    }
}
