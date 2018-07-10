<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class FilesController extends Controller
{
   
   
   
    private $file_path;
 
    public function __construct()
    {
        $this->file_path = "public/files";
    }
 
   
   
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       
         $files = $request->file('file');
         
        $arr_id = $request->input('arrangement_id');
        
        if (!is_array($files)) {
            $files = array($files);
        }             
        for ($i = 0; $i < count($files); $i++) {
            
            $orgfile = $files[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $orgfile->getClientOriginalExtension();
          
            $orgfile->storeAs($this->file_path, $save_name);
          
            
            $file = new File();
            $file->saved_name = $save_name;
            $file->original_name = basename($orgfile->getClientOriginalName());
            $file->arrangement_id = $arr_id;
            
            $file->type = strtolower($orgfile->getClientOriginalExtension());

            
            $file->save();
           
        }

        return response()->json([
            'message' => 'Image saved Successfully'
        ], 200);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filename = $request->id;
        $file = File::where('original_name', basename($filename))->first();
 
        if (empty($file)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }
 
        $file_path = $this->file_path . '/' . $file->saved_name;
 
        if (file_exists($file_path)) {
            unlink($file_path);
        }
 
        if (!empty($file)) {
            $file->delete();
        }
 
        return response()->json(['message' => 'File successfully delete'], 200);
    }
}
