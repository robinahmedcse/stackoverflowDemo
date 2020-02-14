<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
 
    
    public function store(Question $question,Request $request)
    {
      
        $question->answers()->create($request->validate([
            'body' =>'required'
        ])+ ['user_id'=> \Auth::id()]);
        
        
            return back()->with('success','Answer Submitted');
        
    }

 
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer, Question $question)
    {
        $this->authorize('update',$answer);
        return view('answers.edit',  compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
    
    
    
    
    
    
    
    
}
