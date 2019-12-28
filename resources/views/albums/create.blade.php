@extends('layouts.app')

@section('title','create')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-body mt-5 p-2 text-dark mx-auto">
            <h3 class="text-center">Create Album</h3>
            {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {{Form::token()}}
             {{Form::bsText('name','', 'Enter album name')}}

             {{Form::bsTextArea('description','', 'Enter Album description')}}
             {{Form::bsFile('cover_image')}}
             {{Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

 

    {{-- // @End of content section --}}
@endsection 
