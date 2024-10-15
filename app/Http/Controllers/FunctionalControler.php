<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Functional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FunctionalControler extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $functionals=Functional::all();

        return view('back.pages.super.functional.index', compact('functionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $functional= new Functional();
        return view('back.pages.super.functional.create', compact('functional'));
    }

    // Checking data in base

    public function checkData(Request $request){
        $label = $request->query('label_functional');
        $exists = Functional::where('label_functional', $label)->exists();
        
        return response()->json(['exists' => $exists]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { // validate
   

        if(isset($request->labels)){
            for($i=0; $i<count($request->labels); $i++){       
                $is_label=Functional::where('label_functional', $request->labels[$i])->exists();
                if($is_label){
                    $request->session()->put('is_exist', $request->label_functionnal);
                }else{
                    Functional::create([
                    'superadmin_id'=>Auth::guard('superadmin')->user()->id,
                    'label_functional'=>$request->labels[$i],
                    'descrip_functional'=>$request?->descriptions[$i],
                    ]);
                } 

            }

            return redirect()->route('super.functional.index')->with('success', "functions on été bien crée");

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
    public function edit(Functional $functional)
    {
        return view('back.pages.super.functional.create', compact('functional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Functional $functional)
    {
        $functional->update($request->all());
        $functional->save();
        
        return redirect()->route('super.functional.index')->with('success', "$functional->label_functional à été bien modifier");
    }

    public function delete(Functional $functional){

        return view('back.pages.super.functional.delete', compact('functional'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Functional $functional)
    {
        $functional->delete();
        
        return redirect()->route('super.functional.index')->with('success', "Fonctionalité à été bien suprimer");
    }

    public function addId(Functional $functional)
    {
        $admins=Admin::where('id','=!', );
        $functional->admins;
        return route('super.functional.addId');
    }
}
