<?php namespace storage;
use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {
    
    public function register() {
        $this->app->bind(
                'storage\person\PersonRepository',
                'storage\person\EloquentPersonRepository'
        );
    }
}