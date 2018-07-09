<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Arrangement;

class ArrangementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $song = Song::find($id);
        return view('arrangements.create')->with('song',$song);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'description' => 'required',
            'type' => 'required',
            'song_id' => 'required',
        ]);

        $arrangement = new Arrangement;
        $arrangement->description = $request->input('description');
        $arrangement->type = $request->input('type');
        $arrangement->song_id = $request->input('song_id');
        $arrangement->save();
        $song_id = $request->input('song_id');
        $song = Song::find($song_id);
        return redirect('/songs/'.$song_id )->with('success','Arrangment Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  $arrangement = Arrangement::find($id);
        return view('arrangements.show')->with('arrangement',$arrangement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arrangement = Arrangement::find($id);
        return view('arrangements.edit')->with('arrangement',$arrangement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description' => 'required',
            'type' => 'required',
        ]);

        $arrangement = Arrangement::find($id);
        $arrangement->description = $request->input('description');
        $arrangement->type = $request->input('type');
        $arrangement->save();
        $song_id = $arrangement->song->id;
        return redirect('/songs/'.$song_id )->with('success','Arrangment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete files here too
        $arrangement = Arrangement::find($id);  
        $type = $arrangement->type;
        $song = Song::find($arrangement->song->id); 
        $arrangement->delete();

        $msg = $type.' arrangement of '.$song->title.' has been Deleted';
        return redirect('/songs/'.$song->id)->with('success',$msg);
    }
}
