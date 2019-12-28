@extends('layouts.app')

@section('title','Edit')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-body mt-5 p-2 text-dark mx-auto">
          <a href="/todo/{{$todo->id}}" class="btn btn-outline-secondary">Go Back</a>
            <h3 class="text-center">Edit Todo</h3>
            {!! Form::open(['action' => ['TodosController@update', $todo->id], 'method' => 'POST']) !!}
             {{Form::token()}}
             {{Form::bsText('text',$todo->text)}}
             {{Form::bsTextArea('body',$todo->body)}}
             {{Form::bsText('due',$todo->due)}}
             {{Form::hidden('_method','PUT')}}
           {{Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

 

    {{-- // @End of content section --}}
@endsection 
