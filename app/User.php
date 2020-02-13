<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
      //Mass Assignment
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    
        // one to many ()
    public function questions() {
        return $this->hasMany(Question::class);
    }
    
    
      public function Answers() {
       return $this->hasMany(Answer::class);
   }
   
   
   
   
   public function getAvatarAttribute() {
                $email = $this->email;
                $size = 20;
                return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;        
   } 
   
   
    
    
    
    
    
    
    
    
    
    
    
    
    /// end of user class
}
