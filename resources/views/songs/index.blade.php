@extends('layouts.app')

@section('content')
<h3>Songs</h3>
<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Menu</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="/songs/create" class="btn btn-primary">Add New Song</a>
                        </div>  
                        <div class="col-md-8">
                            <form class="" action="#">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search for title, composer, etc." class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-search search-icon"></i>
                                            </span>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
<!--song list-->
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Song list</h4>
                    </div>
                    <div class="card-body">
                            @if(count($songs)>0)
                            <table class="table table-hover __web-inspector-hide-shortcut__">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($songs as $song)
                                     
                                        <tr> 
                                            <td><a href="/songs/{{$song->id}}">{{$song->title}}</a></td>
                                      
                                        </tr>
                   
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$songs->links()}}
                             @else
                             <div class="jumbotron jumbotron-fluid">
                                 <center>
                                <h2>No Songs Yet</h2>
                                
                            <a href="/songs/create" class="btn btn-lg btn-primary">Add New Song</a>
                                 </center>
                             </div>
                             @endif
                    </div>
                </div>



    </div>
</div>
@endsection