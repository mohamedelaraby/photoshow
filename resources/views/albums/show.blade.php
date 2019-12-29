@extends('layouts.app')

@section('title','show')
@section('content')

{{-- Back Button--}}
<div class="row">
    <a href="/" class="btn btn-outline-secondary mx-3" >Back</a>
    <a href="/photos/create/{{$album->id}}" class="btn btn-info">Add Photos</a>
</div>

<hr>

{{--Album content--}}
@if(count($photo) > 0)


    <?php

    // $colCount ;- Get the number of albums
    //$i :- counter
    $colCount = count($photo);
    $i=1;
    ?>

    <div id="albums">
        <div class="row text-center">
            @foreach($photos as $photo)

                {{--     If albums number is 1 then display them               --}}
                @if($i == $colCount)
                    <div class="col-sm-4 col-md-4 align-content-end">
                        <a href="/albums/{{$photo->id}}">
                            <img src="storage/photos/{{$photo->$photo}}"
                                 alt="{{$photo->name}}" class="img-thumbnail rounded float-left" >
                        </a> <br>
                        <h4>{{$photo->title}}</h4>

                        @else
                            <div class="col-sm-4 col-md-4">
                                <a href="/albums/{{$photo->id}}">
                                    <img src="storage/photos/{{$photo->$photo}}"
                                         alt="{{$photo->name}}" class="img-thumbnail rounded" >
                                </a> <br>
                                <h4>{{$photo->title}}</h4>
                                @endif

                                {{--                  --}}
                                @if($i % 3 == 0)
                            </div></div> <div class="row text-center">
                        @else
                    </div>
                @endif
                <?php $i++;?>
            @endforeach
        </div>
    </div>
@else
    <p class="lead">No phots To display</p>
@endif



{{--<div class="row">--}}
{{--    <div class="col-sm-4 col-md-4">--}}
{{--        <a href="{{$album->id}}/edit" class="btn btn-outline-info">Edit  </a>--}}
{{--    </div>--}}

{{--    <div class="col-sm-4 col-md-4 mt-1">--}}
{{--        --}}{{-- Delete request   --}}
{{--        {!! Form::open(['action' => ['AlbumsController@destroy', $album->id], 'method' => 'POST']) !!}--}}
{{--        {{Form::token()}}--}}
{{--        {{Form::hidden('_method','DELETE')}}--}}
{{--        {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}--}}
{{--        {!! Form::close() !!}--}}
{{--    </div>--}}
{{--</div>--}}



    {{-- if user is auth show him the delte and edit button otherwise hidden
    @if(!Auth::guest())
        {{-- if user is auth and === post_user_id then show him edit and delete otherwise no --}}
        {{-- @if(Auth::user()->id == $post->user_id)
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            </div>
        
            {{-- Delete form --}}
            {{-- {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'ml-auto'])!!}
            <div class="form-group float-right">
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete',['class' => 'float-right btn btn-danger'])}}
            </div>

            {!!Form::close()!!}
        </div> --}}
        {{-- @endif --}}
    {{-- @endif --}} 
@endsection
