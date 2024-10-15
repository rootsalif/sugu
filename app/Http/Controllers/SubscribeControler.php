<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Admin;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubscribeControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribes=Subscribe::all();
        $admins=Admin::where('status_admin', '!=','desable')->get();
        return view('back.pages.super.subscribe', compact('subscribes','admins'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->date_debut < $request->date_fin){

            $code=random_int(1234, 9876543210);

            $data=collect($request->all())
                                  ->put('superadmin_id',Auth::guard('superadmin')->user()->id)
                                  ->put('admin_id', $request->admin_id)
                                  ->put('code_abonner', $code)
                                  ->toArray();
            $data=array_replace($data, array('code_abonner'=>Hash::make($request->code_abonner)));

            Subscribe::create($data);

            return redirect()->back();

        }else{
            return redirect()->back();

        }

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
