@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                        <div class="float-right">
                            <a href="/songs/{{$song->id}}/edit" class="btn btn-success">Edit</a>
                            {!!Form::open(['action'=>['SongsController@destroy',$song->id],'method' => 'POST', 'class' => 'pull-right','id'=>'form_delete'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger','name' => 'delete_modal'])}}
                            {!!Form::close()!!}
                        </div>
                <h1 class="card-title">{{$song->title}}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                            @if(count($song->composers)>0)
                            <small>Songwritter(s):</small>
                      @foreach($song->composers as $composer)
                      <div class="badge badge-primary">
                        {{$composer->firstName." ".$composer->lastName}}
                      </div>
                         @endforeach
                 
                        @else
                        <small><i>No tags</i></small>
                        @endif
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title">Lyrics</h1>
                                </div>
                                <div class="card-body">
                                    {!!$song->lyrics!!}
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
            @if(count($song->tags())>0)
                <small>Tags:</small>
          @foreach($song->tags() as $tag)
          <div class="badge badge-default">
            {{$tag}}
          </div>
             @endforeach
     
            @else
            <small><i>No tags</i></small>
            @endif
        </div>
        </div>
    </div>
</div>
@endsection