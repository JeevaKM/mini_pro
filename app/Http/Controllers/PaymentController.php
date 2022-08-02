<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Myuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class PaymentController extends Controller
{
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
            return view('gigsboard.myprofile',compact('Myuser'));
       
          }
          else{
            return back()->withErrors(['Invalid credentials!']);
          }
    }

    public function store(Request $request)
    {
      $validated=$request->validate(['name'=>'required',
                     'email'=>'required|unique:myusers,email',
                     'password'=>'required',
                     'location'=>'required'
                  ]);
       $email=$request->email;
       $password=$request->password;

       $Myuser=new Myuser;
       $Myuser->name=$request->name;
       $Myuser->email=$request->email;
       $Myuser->password=Hash::make($request->input('password'));
       $Myuser->location=$request->location;
       $Myuser->save();
       Auth::login($Myuser);
       return view('gigsboard.myprofile',compact('Myuser'))->with('insert','Inserted Successfully');
    }

    public function edit($id)
    {
        $Myuser=Myuser::find($id);
        return view('gigsboard.updateUser',compact('Myuser'));
    }

    public function update(Request $request)
    {
      
       $Myuser=Myuser::find($request->id);
       $Myuser->name=$request->name;
       $Myuser->email=$request->email;
       $Myuser->location=$request->location;
       $Myuser->save();
       return redirect('gigsboard.myprofile')->with('update','Updated Successfully');
    }

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
