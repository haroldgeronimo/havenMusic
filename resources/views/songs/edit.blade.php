@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Song</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                            {!! Form::open(['action' => ['SongsController@update', $song->id], 'method' => 'POST'])!!}
                                    <div class="form-group">
                                        {{Form::label('title','Title')}}
                                        {{Form::text('title',$song->title,['class'=>'form-control','placeholder'=>'Song title'])}}
                                    </div>
                                    <div class="form-group">
                                            {{Form::label('lyrics','Lyrics')}}
                                            {{Form::textarea('lyrics',$song->lyrics,['id'=> 'article-ckeditor', 'class'=>'form-control','placeholder'=>'Enter Song Lyrics here'])}}
                                      
                                    </div>
                                    {{Form::hidden('_method','PUT')}}
                                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                  
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection