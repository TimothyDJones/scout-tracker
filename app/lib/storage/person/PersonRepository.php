<?php namespace storage\person;

 interface PersonRepository {
     
     public function all();
     
     public function find($id);
     
     public function add($input);
     
}
