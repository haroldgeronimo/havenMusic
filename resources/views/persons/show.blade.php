@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                        <div class="float-right">
                            <a href="/persons/{{$person->id}}/edit" class="btn btn-success">Edit</a>
                            {!!Form::open(['action'=>['PersonsController@destroy',$person->id],'method' => 'POST', 'class' => 'pull-right','id'=>'form_delete'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger','name' => 'delete_modal'])}}
                            {!!Form::close()!!}
                        </div>
                <h1 class="card-title">{{$person->lastName}}, {{$person->firstName}}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                            @if(count($person->songs)>0)
                            <table class="table table-hover __web-inspector-hide-shortcut__">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Songwritter(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($person->songs as $song)
                                     
                                        <tr> 
                                            <td><a href="/songs/{{$song->id}}">{{$song->title}}</a></td>
                                            <td>
                                                @if(count($song->composers)>0)
                                                    @foreach($song->composers as $composer)
                                              
                                                        <a href="/persons/{{$composer->id}}" class="badge badge-default">{{$composer->lastName}}</a>
                                              
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                   
                                    @endforeach
                                    </tbody>
                                </table>
                             @else
                             <h3>No Songs</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection