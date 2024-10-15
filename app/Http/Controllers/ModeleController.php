<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeles=Modele::all();
        
        return view('back.pages.user.recorder.modele.index', compact('modeles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $modele= new Modele();

        $marqueSelected=Marque::pluck('label_marque', 'id');

        return view('back.pages.user.recorder.modele.create', compact('modele', 'marqueSelected'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_modele' => 'required|string|max:255|unique:modeles,label_modele',
            'describ_modele' => 'required|string|max:255',
            'path_modele' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_modele')) {
            $path = $request->file('path_modele')->store('modeles', 'public');
            $data['path_modele']= $path;
        }

        $modele=Modele::create($data);

        return redirect()->back()
            ->with('success', 'Modele created successfully!')
            ->with('modele', $modele);


        // return response()->json([
        //     'message' => 'modele created successfully!',
        //     'modele' => $modele
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
    public function edit(Modele $modele)
    {
        $marqueSelected=Marque::pluck('label_marque', 'id');

        
        return view('back.pages.user.recorder.modele.create', compact('modele', 'marqueSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modele $modele)
    {
        $request->validate([
            'label_modele' => 'required|string|max:255',
            'describ_modele' => 'required|string|max:255',
            'path_modele' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_modele')) {
            $path = $request->file('path_modele')->store('modeles', 'public');
            $data['path_modele']= $path;
        }

        $modele->update($data);

        return redirect()->route('user.modele.index')
            ->with('success', 'Modele created successfully!')
            ->with('modele', $modele);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Modele $modele){

        return view('back.pages.user.recorder.modele.delete', compact('modele'));
    }
    public function destroy(Modele $modele)
    {
        $modele->delete();
        
        return redirect()->route('user.modele.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
