@extends('layouts.app')

@section('title','Albums')
@section('content')

    @if(count($albums) > 0)


        <?php

        // $colCount ;- Get the number of albums
            //$i :- counter
            $colCount = count($albums);
            $i=1;
        ?>

        <div id="albums">
            <div class="row text-center">
                @foreach($albums as $album)

                    {{--     If albums number is 1 then display them               --}}
                    @if($i == $colCount)
                        <div class="col-sm-4 col-md-4 align-content-end">
                            <a href="/albums/{{$album->id}}">
                                <img src="storage/album_covers/{{$album->cover_image}}"
                                     alt="{{$album->name}}" class="img-thumbnail rounded float-left" >
                            </a> <br>
                        <h4>{{$album->name}}</h4>

                        @else
                        <div class="col-sm-4 col-md-4">
                            <a href="/albums/{{$album->id}}">
                                <img src="storage/album_covers/{{$album->cover_image}}"
                                     alt="{{$album->name}}" class="img-thumbnail rounded">
                            </a> <br>
                        <h4>{{$album->name}}</h4>
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
        <p class="lead">No albums To display</p>
    @endif




@endsection
