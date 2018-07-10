{{--documents--}}
@if(count($arrangement->documents)>0)
<h3>Document Files</h3>
<table class="table table-hover __web-inspector-hide-shortcut__">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
    <tbody>
      @foreach($arrangement->documents as $docs)
     
        <tr> 
            <td><a href="/storage/files/{{$docs->saved_name}}" target="_blank">{{$docs->original_name}}</a></td>
            <td>{{$docs->type}}</td>
            
        </tr>

    @endforeach
    </tbody>
</table>
@endif
{{--music--}}
@if(count($arrangement->music)>0)
<h3>Music</h3>
<table class="table table-hover __web-inspector-hide-shortcut__">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
      @foreach($arrangement->music as $music)
     
        <tr> 
            <td>{{$music->original_name}}</td>
            <td><audio controls>
            <source src="/storage/files/{{$music->saved_name}}" type="">
            </audio></td>
            
        </tr>

    @endforeach
    </tbody>
</table>
@endif
{{--others--}}
@if(count($arrangement->others)>0)
<h3>Others</h3>
<table class="table table-hover __web-inspector-hide-shortcut__">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
      @foreach($arrangement->others as $other)
     
        <tr> 
            <td><a href="/storage/files/{{$other->saved_name}}" target="_blank">{{$other->original_name}}</a></td>
            <td>{{$other->type}}</td>
            
        </tr>

    @endforeach
    </tbody>
</table>
@endif