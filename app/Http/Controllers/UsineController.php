<?php

namespace App\Http\Controllers;

use App\Models\Usine;
use Illuminate\Http\Request;

class UsineController extends Controller
{
          /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usines=Usine::all();
        
        return view('back.pages.user.recorder.usine.index', compact('usines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $usine= new Usine();

        return view('back.pages.user.recorder.usine.create', compact('usine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_usine' => 'required|string|max:255|unique:usines,label_usine',
        ]);
        $data=$request->all();

        $usine=Usine::create($data);

        return redirect()->back()
            ->with('success', 'Usine created successfully!')
            ->with('usine', $usine);


        // return response()->json([
        //     'message' => 'usine created successfully!',
        //     'usine' => $usine
        // ]);
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
    public function edit(Usine $usine)
    {
        
        return view('back.pages.user.recorder.usine.create', compact('usine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usine $usine)
    {
        $request->validate([
            'label_usine' => 'required|string|max:255',
        ]);
        $data=$request->all();

        
        $usine->update($data);

        return redirect()->route('user.usine.index')
            ->with('success', 'Usine created successfully!')
            ->with('usine', $usine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Usine $usine){

        return view('back.pages.user.recorder.usine.delete', compact('usine'));
    }
    public function destroy(Usine $usine)
    {
        $usine->delete();
        
        return redirect()->route('user.usine.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
