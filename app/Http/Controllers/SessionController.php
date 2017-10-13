<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function showLoginForm()
    {
        return view('sess.login');
    }

    public function login(Request $request)
    {
        // return $request->all();
        $attempt = Auth::attempt([
            'email' => $request->input('username'),
            'password' => $request->input('password')
            ]);

        if ($attempt) {
            return redirect('/profile')->with('flash_message', 'you have been successful login.');
        }

        return back()->with('flash_message', 'wrong username or password')->withInput();
    }

    /**
     * logout
     * 
     * @param  $[name] [<description>]
     * 
     * @return [type] [description]
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('flash_message', 'you have been logout');
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
        //
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
