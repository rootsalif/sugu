<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
          /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs=Couleur::all();
        
        return view('back.pages.user.recorder.couleur.index', compact('couleurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $couleur= new Couleur();

        return view('back.pages.user.recorder.couleur.create', compact('couleur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_couleur' => 'required|string|max:255|unique:couleurs,label_couleur',
        ]);
        $data=$request->all();

        $couleur=Couleur::create($data);

        return redirect()->back()
            ->with('success', 'Couleur created successfully!')
            ->with('couleur', $couleur);


        // return response()->json([
        //     'message' => 'couleur created successfully!',
        //     'couleur' => $couleur
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
    public function edit(Couleur $couleur)
    {
        
        return view('back.pages.user.recorder.couleur.create', compact('couleur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Couleur $couleur)
    {
        $request->validate([
            'label_couleur' => 'required|string|max:255',
        ]);
        $data=$request->all();

        
        $couleur->update($data);

        return redirect()->route('user.couleur.index')
            ->with('success', 'Couleur created successfully!')
            ->with('couleur', $couleur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Couleur $couleur){

        return view('back.pages.user.recorder.couleur.delete', compact('couleur'));
    }
    public function destroy(Couleur $couleur)
    {
        $couleur->delete();
        
        return redirect()->route('user.couleur.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
