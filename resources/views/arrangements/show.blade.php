@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                        <div class="float-right">
                            <a href="/arrangements/{{$arrangement->id}}/edit" class="btn btn-success">Edit</a>
                            {!!Form::open(['action'=>['ArrangementsController@destroy',$arrangement->id],'method' => 'POST', 'class' => 'pull-right','id'=>'form_delete'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger','name' => 'delete_modal'])}}
                            {!!Form::close()!!}
                        </div>
                <h1 class="card-title"><a href="/songs/{{$arrangement->song->id}}">{{$arrangement->song->title}}</a></h1>
                <p><small>{{$arrangement->description}}</small><div class="badge badge-lg badge-success">{{$arrangement->type}}</div></p>
            </div>
            <div class="card-body">
               
            </div>
            
        </div>
    </div>
</div>
@endsection