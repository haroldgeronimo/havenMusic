@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Song</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                            {!! Form::open(['action' => 'SongsController@store', 'method' => 'POST'])!!}
                                    <div class="form-group">
                                        {{Form::label('title','Title')}}
                                        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Song title'])}}
                                    </div>
                                    <div class="form-group">
                                            {{Form::label('comp','Composer(s)')}}
                                            {{Form::text('composers','',['id'=> 'composers', 'class'=>'form-control','placeholder'=>'Add Composer(s) Here'])}}
                                                    <script>
                                                    var composers = [
                                                        @foreach ($composers as $composer)
                                                            {composer: "{{$composer->lastName}},{{$composer->firstName}}",
                                                                id:{{$composer->id}} 
                                                            },
                                                        @endforeach
                                                    ];
                                                    </script>
                                                    <small>Last Name,[space]First Name [e.g. Beethoven, Ludwig Van]</small>
                                    </div>
                                    <div class="form-group">
                                            {{Form::label('lyrics','Lyrics')}}
                                            {{Form::textarea('lyrics','',['id'=> 'article-ckeditor', 'class'=>'form-control','placeholder'=>'Enter Song Lyrics here'])}}
                                      
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('tag','Tags')}}
                                        {{Form::text('tags','',['id'=> 'tags', 'class'=>'form-control','placeholder'=>'Enter tags here'])}}
                                                <script>
                                                var tags = [
                                                    @foreach ($tags as $tag)
                                                    {tag: "{{$tag}}" },
                                                    @endforeach
                                                ];
                                                </script>
                                </div>
                                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                  
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
        <script>
        var tags = [
            @foreach ($tags as $tag)
            {tag: "{{$tag}}" },
            @endforeach
        ];
        </script>

@endsection