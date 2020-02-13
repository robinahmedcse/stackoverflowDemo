<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionController extends Controller
{
    
    public function __construct() {
        return $this->middleware('auth',['except'=>['index','show']]);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $questions=  Question::latest()->paginate(4);
//       echo"<pre>";
//       print_r($questions);
//       exit();
       
        return view('questions.index',  compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create',  compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()
                ->create($request->only('title','body'));
        
        return redirect()->route('questions.index')
                ->with('success', 'Your Question Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        
        return view('questions.show',  compact('question'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
//        if(\Gate::denies('update-question', $question)){
//           abort (403,'Access Denies');
//        }
        $this->authorize('update', $question);
                
        
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
//          if(\Gate::denies('update-question', $question)){
//            abort (403,'Access Denies');
//        }
        
                $this->authorize('update', $question);
                
        $question->update($request->only('title','body'));
            return redirect()->route('questions.index')
                ->with('success', 'Your Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        
//          if(\Gate::denies('delete-question', $question)){
//            abort (403,'Access Denies');
//        }
                $this->authorize('update', $question);
        
        $question->delete();
            return redirect()->route('questions.index')
                ->with('success', 'Your Question Deleted');
    }
}