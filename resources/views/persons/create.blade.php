@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Person</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                            {!! Form::open(['action' => 'PersonsController@store', 'method' => 'POST'])!!}
                                    <div class="form-group">
                                        {{Form::label('firstname','First Name')}}
                                        {{Form::text('firstName','',['class'=>'form-control','placeholder'=>'First Name'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('lastname','Last Name')}}
                                        {{Form::text('lastName','',['class'=>'form-control','placeholder'=>'Last Name'])}}
                                     
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