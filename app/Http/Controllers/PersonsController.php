<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::orderBy('lastName','desc')->paginate(20);
        return view('persons.index')->with('persons',$persons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.create');
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
            'lastName' => 'required',
            'firstName' => 'required'
        ]);

        $person = new Person;
        $person->lastName = $request->input('lastName');
        $person->firstName = $request->input('firstName');
        $person->save();

        return redirect('/persons')->with('success','Person Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        return view('persons.show')->with('person',$person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        return view('persons.edit')->with('person',$person);
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
            'lastName' => 'required',
            'firstName' => 'required'
        ]);


        $person = Person::find($id);
        $person->lastName = $request->input('lastName');
        $person->firstName = $request->input('firstName');
        $person->save();

        return redirect('/persons')->with('success','Person Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $person = Person::find($id);       
        $person->delete();

        return redirect('/persons')->with('success', 'Person Deleted');
    }
}
