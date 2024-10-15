<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\subCategorie;
use Illuminate\Http\Request;

class subCategorieController extends Controller
{
    public function index()
    {
        $sub_categories=subCategorie::all();
                
        return view('back.pages.super.sub-categorie.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_categorie= new subCategorie();
        
        $categorieSelected=Categorie::pluck('label_categorie', 'id');

        return view('back.pages.super.sub-categorie.create', compact('sub_categorie', 'categorieSelected'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // Validation des données
        $request->validate([
            'label_sub_categorie' => 'required|string|max:255|unique:sub_categories,label_sub_categorie',
            'describ_sub_categorie' => 'required|string|max:255',
            'path_sub_categorie' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
        ]);

        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_sub_categorie')) {
            $path = $request->file('path_sub_categorie')->store('sub-categories', 'public');
            $data['path_sub_categorie'] = $path;
        }

        $sub_categorie=subCategorie::create($data);

        return response()->json([
            'message' => 'categorie created successfully!',
            'sub_categorie' => $sub_categorie
        ]);
        
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
    public function edit(subCategorie $sub_categorie)
    {
        $categorieSelected=Categorie::pluck('label_categorie', 'id');

        return view('back.pages.super.sub-categorie.create', compact('sub_categorie', 'categorieSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subCategorie $sub_categorie)
    {
        // Validation des données
        $request->validate([
            'label_sub_ategorie' => 'required|string|max:255',
            'describ_sub_ategorie' => 'required|string|max:255',
            'path_sub_ategorie' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mise à jour du rôle
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_sub_ategorie')) {
            $path = $request->file('path_sub_ategorie')->store('sub-categories', 'public');
            $data['path_sub_ategorie'] = $path;
        }
        $sub_categorie->update($data);
        return redirect()->route('super.sub-categorie.index');

        // return response()->json([
        //     'message' => 'famille updated successfully!',
        //     'sub_categorie' => $sub_sub_ategorie
        // ]);
    
    }

    public function delete(subCategorie $sub_categorie){

        return view('back.pages.super.sub-categorie.delete', compact('sub_categorie'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subCategorie $sub_categorie)
    {
        $sub_categorie->delete();
        
        return redirect()->route('super.sub-categorie.index')->with('success', "Sous catégorie à été bien suprimer");
    }
}
