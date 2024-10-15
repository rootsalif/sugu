<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.pages.admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:8',
        ],[
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            'email.exists'=>'Cet email n\'existe pas. veillez verifier',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'caractère minumum est 8',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            
            return redirect()->route('admin.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function home(){
        $admin=Auth::guard('admin')->user();
        $enterprise=Enterprise::findOrfail($admin->id);
        if(session()->has('key')){
            Auth::logout();
            session()->forget('key');
            return redirect()->route('admin.login');
        }
        
        return view('back.pages.admin.home', compact('admin', 'enterprise'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
