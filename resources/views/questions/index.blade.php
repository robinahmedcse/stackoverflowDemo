@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>All Questions</h3>
                        <h3 class="ml-auto">
                            <a class="btn btn-outline-dark" href="{{route('questions.create')}}">
                                Ask Question
                            </a>
                        </h3>
                    </div>
                </div>

                <div class="card-body">
                    
                         @include('layouts._message')
                    
                 @foreach($questions as $quest)
                 <div class="media">
                
                     <div class="d-flex flex-column counters">
                         <div class="vote">
                             <strong>
                                 {{$quest->votes}}
                             </strong>
                             {{str_plural('vote',$quest->votes)}}
                         </div>
                         
                          <div class="status {{$quest->status}}">
                             <strong>
                                 {{$quest->answers_count}}
                             </strong>
                             {{str_plural('answer',$quest->answers_count)}}
                         </div>
                         
                          <div class="views">
                             
                                 {{$quest->views}}
                           
                             {{str_plural('view',$quest->views)}}
                         </div>
                     </div>

                     <div class="media-body">
                         <div class="d-flex align-items-center">
                                   <h3 class="mt-0">
                             <a href="{{$quest->url}}">
                             {{$quest->title}}
                             </a>
                        </h3>
                             <div class="ml-auto">
                           @can('update',$quest)
                                 <a href="{{route('questions.edit',$quest->id)}}" class="btn btn-sm btn-outline-warning">Edit</a>
             @endcan
                          
                                 @can('delete',$quest)
                             <form method="post" class="form-delete" action="{{route('questions.destroy',$quest->id)}}">
                                 @method('DELETE')
                                 @csrf
                                 <button onclick="return confirm('Are You Sure??')" class="btn btn-sm btn-outline-secondary" 
                                         type="submit">Delete
                                 </button>
                             </form>
                                       @endcan
                                          </div>
                         </div>
                         
                             <p class="lead">
                                 
                                 Asked By <a href="{{$quest->user->url}}">
                                     {{$quest->user->name}}
                                 </a>
                                 <small class="text-muted">
                                       {{$quest->create_date}}
                                 </small>
                                     
                             </p>
                       
                         {{str_limit($quest->body, 250)}}
                     </div>
                 </div>
                 <hr>
                 @endforeach
                 <div class="pagination justify-content-center">
                      {{$questions->links()}}
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
