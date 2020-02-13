@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h3>{{ $question->title}}</h3>
                            <h3 class="ml-auto">
                                <a class="btn btn-outline-dark" href="{{route('questions.index')}}">
                                    Back To All Question
                                </a>
                            </h3>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column votes-control">
                            <a class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1205</span>
                            <a class="votes-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a class="favorite mt-2">
                                      <i class="fas fa-star fa-2x"></i>
                                <span class="faborite">
                                    1234
                                </span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}

                            <div class="float-right">
                                <span>
                                    Question by:{{ $question->create_date}}
                                </span>
                                <div class="media">
                                    <a href="{{$question->user->url}}">
                                        <img src="{{$question->user->avatar}}">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{$question->user->url}}">
                                            {{ $question->user->name}}
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row  mt-5  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>
                            {{ $question->answers_count}}
                            {{str_plural('Answers',$question->answers_count)  }}
                        </h3>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                    <div class="media">
                        <div class="media-body">
                            {!! $answer->body_text !!}
                            <div class="float-right">
                                <span>
                                    Answered:{{ $answer->create_date}}
                                </span>
                                <div class="media">
                                    <a href="{{$answer->user->url}}">
                                        <img src="{{$answer->user->avatar}}">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{$answer->user->url}}">
                                            {{ $answer->user->name}}
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




</div>
</div>
@endsection
