<?php

namespace App\Http\Controllers;

use App\Models\invitemodel;
use App\Models\inviteUserModel;
use Exception;
use Illuminate\Http\Request;
use Mail;

class invitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invite');
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
        // dd($request);
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
         ]);
         try{
            $email = $request->input('email');
            $name = $request->input('name');
            $subject = $request->input('subject');
            $data = array(
                'name'=>'Invitation To Join Newtwork',
            );
                $data = array('name'=>$name, 'email'=>$email, 'message'=>"You are Invited to Join Our Network");
                Mail::send('mailtemplate', $data, function($message) use ($email, $name,$subject)
                {   
                    $message->from('msharifse11@gmail.com', 'DexterCode');
                    $message->to($email, $name)->subject($subject);
                });
                return redirect()->route('invite')->with('success','Invitation Send Successfully');
           
         }catch(Exception $exc){
            // print_r($exc->getMessage());
            return redirect()->route('invite')->with('error','Something Went Wrong');

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
