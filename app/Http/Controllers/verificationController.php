<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class verificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    return view('pinverify');
    return view('auth.pinverify');

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
           $validated = $request->validate([
            'email' => 'required',
            'verification_pin' => 'required',
            ]);
        //    email
        //    verification_pin    
        if($validated){
            $email = $request->input('email');
            $verification_pin = $request->input('verification_pin');

            try{

                $users = User::where([
                    'email' => $email,
                    'verification_pin' => $verification_pin
             ])->get();
             $count=$users->count();
             if($count > 0){
                $update = User::where([
                    'email' => $email,
                    'verification_pin' => $verification_pin
             ])->update(['pin_verified' => 1]);
             if($update){
                 return redirect()->route('login')->with('success','Successfully Registered');

             }else{
                return redirect()->route('verifypin')->with('error','Error Please try again');

             }
             }else{
                return redirect()->route('verifypin')->with('error','Verification Error, Try again');

             }
                    
            }catch(Exception $exce){
                print_r($exce);
            }
        }
        print_r($request->all());
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
