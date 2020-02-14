<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    
       //Mass Assignment
     protected $fillable = ['body', 'user_id'];
    
      public function question() {
       return $this->belongsTo(Question::class);
   }
   
    
       public function user() {
       return $this->belongsTo(User::class);
   }
   
    
   
   
   public static function boot() {
       parent::boot();
       
       static::created(function($answer){
              $answer->question->increment('answers_count');
              $answer->question->save();
       });
   }
   
   
   public function getBodyTextAttribute() {
       return \Parsedown::instance()->text($this->body);
   }
   
 
      
   public function getCreateDateAttribute() {
       return $this->created_at->diffForHumans();
   } 
    
   
   
         

   
   
   
   
   
    
    //end of answer
}
