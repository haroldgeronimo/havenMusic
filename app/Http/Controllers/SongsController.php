<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Person;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::orderBy('title','desc')->paginate(10);
        return view('songs.index')->with('songs',$songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tags = Song::existingTags()->pluck('name');
         $composers = Person::all();
        return view('songs.create')->with('tags', $tags)->with('composers', $composers);
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
            'title' => 'required',
            'lyrics' => 'required'
        ]);


        $song = new Song;
        $song->title = $request->input('title');
        $song->lyrics = $request->input('lyrics');
        
        $song->save();
        $composers =  explode('%', $request->composers);
        if(count($composers)>0 && $request->composers!=""){
         //process songwritters
         
         foreach($composers as $composer){
                if(is_numeric($composer)){
                    $song->composers()->attach($composer);
                }
                else{
                    $name =  explode(', ', $request->composers);
                    if(count($name)!=2)
                    return redirect('/songs/create')->with('error','Error in creating composer.Make sure you follow the format(LastName,[space]FirstName)');
                    $person = new Person;
                    $person->firstName = $name[1];
                    $person->lastName = $name[0];
                    $person->save();

                    $song->composers()->attach($person->id);
                }
            }
        //end of song writers
        }
        $tags = explode(',', $request->tags);
            if(count($tags)>0  && $request->tags!=""){

                $song->untag();
                $song->tag($tags);

                $song->save();
            }

        return redirect('/songs')->with('success','Song Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $song = Song::find($id);
        return view('songs.show')->with('song',$song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $song = Song::find($id);
        $composers = Person::all();
        $tags = Song::existingTags()->pluck('name');
        return view('songs.edit')->with('song',$song)->with('tags', $tags)->with('composers',$composers);

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
            'title' => 'required',
            'lyrics' => 'required'
        ]);

        $song = Song::find($id);
        $song->title = $request->input('title');
        $song->lyrics = $request->input('lyrics');
        $song->save();
       
        $composers =  explode('%', $request->composers);
       // dd($composers);
        if(count($composers)>0 &&$request->composers!="" ){

            if(count($song->composers)>0){
                $song->composers()->detach();
            }
            //process songwritters
            
            foreach($composers as $composer){
                   if(is_numeric($composer)){
                       $song->composers()->attach($composer);
                   }
                   else{
                       $name =  explode(', ', $request->composers);
                       if(count($name)!=2)
                      dd($name); //redirect as error here
                       $person = new Person;
                       $person->firstName = $name[1];
                       $person->lastName = $name[0];
                       $person->save();
   
                       $song->composers()->attach($person->id);
                   }
               }
           //end of song writers
            }
        $tags = explode(',', $request->tags);
        if(count($tags)>0 &&$request->tags!="" ){

            $song->untag();
            $song->tag($tags);

            $song->save();
        }


        return redirect('/songs')->with('success','Song Updated!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);   
        $tags = $song->tags();
        if(count($tags)>0){

            $song->untag();
        }    
        $song->delete();

        return redirect('/songs')->with('success', 'Song Deleted');
    }
}
