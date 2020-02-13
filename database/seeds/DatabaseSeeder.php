<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
            
        factory(App\User::class, 2)->create() ->each(function($u){
                    $u->questions()->saveMany(  
                            factory(App\Question::class, rand(1, 10))->make()         
                  )->each(function ($q){
                      $q->answers()->saveMany(
                              factory(App\Answer::class, rand(1, 10))->make()       
                              );
                  });//saveMany=object relational model
                });



// $this->call(UsersTableSeeder::class);
    }
     
    
    
     
    
    
    
    
    
    //end DatabaseSeeder
}
