<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Myuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

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
        return view('gigsboard.myprofile',compact('Myuser'));
    }
    public function myprofile()
    {
      
       return view('gigsboard.myprofile');
    }

     public function authenticate(Request $request)
    {
        

        $validated=$request->validate([
                     'email'=>'required',
                     'password'=>'required'
                  ]);
        
        $email=$request->email;
        $password=$request->password;
        

        

      if(Auth::attempt(['email'=>$email,'password'=>$password])){
          
            $Myuser=Myuser::where('email',$email)->first();
            Auth::login($Myuser);
            return redirect('home');
       
          }
          else{
            return back()->withErrors(['Invalid credentials!']);
          }
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
                     'password'=>'required',
                     'location'=>'required'
                  ]);
                  $Myuser=new Myuser;
                  $Myuser->name=$request->name;
           
                  $Myuser->email=$request->email;
                  $Myuser->password=Hash::make($request->input('password'));
           
                  $Myuser->location=$request->location;
                 
                  $Myuser->save();
                  Auth::login($Myuser);
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

     public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }    
}
