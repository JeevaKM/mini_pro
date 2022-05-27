<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Myuser;

class MyuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $Myuser=Myuser::all();
        return view('gigsboard.dashboard',compact('Myuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated=$request->validate(['name'=>'required',
                     'email'=>'required|unique:myusers,email',
                     'location'=>'required'
                  ]);

       $Myuser=new Myuser;
       $Myuser->name=$request->name;
       $Myuser->email=$request->email;
       $Myuser->location=$request->location;
       $Myuser->save();
       return redirect('index')->with('insert','Inserted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Myuser=Myuser::find($id);
        return view('gigsboard.updateUser',compact('Myuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      
       $Myuser=Myuser::find($request->id);
       $Myuser->name=$request->name;
       $Myuser->email=$request->email;
       $Myuser->location=$request->location;
       $Myuser->save();
       return redirect('index')->with('update','Updated Successfully');
    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Myuser=Myuser::find($id);
        if($Myuser)
          {
            if($Myuser->delete())
                {
                  return redirect('index')->with('delete','Removed Successfully');;
                }
                else
                {
                  echo "not deleted";
                }
          }
    }     
}
