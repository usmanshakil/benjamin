<?php

namespace App\Http\Controllers;

use App\Models\inviteUserModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.invite-register');

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
        // print_r($request->all());
       try{
        $name=$request->input('name');
        $email=$request->input('email');
        $generate_pin=mt_rand(100000, 999999);
        $add_user=new inviteUserModel();
        $add_user->name=$name;
        $add_user->email=$email;
        $add_user->username=$request->input('username');
        $password=$request->input('password');
        $pass=  Hash::make($password);
        $add_user->password=$pass;
        $add_user->verification_pin=$generate_pin;
        $add_user=$add_user->save();
        $subject="Pin Verification Required ".$generate_pin;
        if($add_user){
            $data = array('name'=>$name, 'email'=>$email, 'verification'=>"$generate_pin ");
                Mail::send('verification', $data, function($message) use ($email, $name,$subject)
                {   
                    $message->from('msharifse11@gmail.com', 'DexterCode');
                    $message->to($email, $name)->subject($subject);
                });
                return redirect()->route('verifypin')->with('success','Verification PIN Sent On Your Email Please Verify and Login');            
        }else{
            return redirect()->route('invite-register')->with('error','Something Went Wrong');            

        }

       }catch(Exception $exce){
           print_r($exce);
         return redirect()->route('invite-register')->with('error', "Username or Email allready Exist");            

       }

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
        //
    }
}
