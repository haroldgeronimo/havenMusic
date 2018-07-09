@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Arrangement for {{$arrangement->song->title}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        {!! Form::open(['action' => ['ArrangementsController@update', $arrangement->id], 'method' => 'PUT'])!!}
                                <div class="form-group">
                                    {{Form::label('desc','Description')}}
                                    {{Form::text('description',$arrangement->description,['class'=>'form-control','placeholder'=>'Description'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('type','Type')}}
                                    {{Form::text('type',$arrangement->type,['class'=>'form-control','placeholder'=>'Arrangement Type'])}}
                                 
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