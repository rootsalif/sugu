<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.pages.super.auth.login');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:superadmins,email',
            'password'=>'required|min:8',
        ],[
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            'email.exists'=>'Cet email n\'existe pas. veillez verifier',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'caractère minumum est 8',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::guard('superadmin')->attempt($credentials)) {
            return redirect()->route('super.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('super.login');
    }
        /**
     * Show the form for creating a new resource.
     */
    public function add()
    {

        $admins=Admin::where('status_admin', '!=','desable')->get();

        return view('back.pages.super.admin.index', compact('admins'));
    }

    public function adminCreate(){

        $admin= new Admin();
        return view('back.pages.super.admin.create', compact('admin'));
    }


    public function adminStore(AdminRequest $request){

        $data=$request->all();

        $data=array_replace($data, array('password'=>Hash::make($request->password)));

        $admin=Admin::create($data);

        return redirect()->route('super.add')->with('success', $admin->name_admin.' à été bien crée!');
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
    public function adminEdit(Admin $admin)
    {
        return view('back.pages.super.admin.create', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(AdminRequest $request, Admin $admin)
    {
        $data=$request->all();

        $data=array_replace($data, array('password'=>Hash::make($request->password)));

        $admin->update($data);

        return redirect()->route('super.add')->with('success', $admin->name_admin.' à été bien modifier!');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function adminDelete(Admin $admin)
     {

        return view('back.pages.super.admin.delete', compact('admin'));
     }

    public function adminDestroy(Admin $admin)
    {
        $admin->status_admin='desable';
        $admin->save();
        return redirect()->route('super.add')->with('success', $admin->name_admin.' à été bien supprimer!');
    }
}
