@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Arrangment for {{$song->title}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        {!! Form::open(['action' => 'ArrangementsController@store', 'method' => 'POST'])!!}
                                <div class="form-group">
                                    {{Form::label('desc','Description')}}
                                    {{Form::text('description','',['class'=>'form-control','placeholder'=>'Description'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('type','Type')}}
                                    {{Form::text('type','',['class'=>'form-control','placeholder'=>'Arrangment Type'])}}
                                    {{Form::hidden('song_id',$song->id)}}
                                </div>
                                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                              
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection