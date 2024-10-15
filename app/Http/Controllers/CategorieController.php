<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Familie;
use App\Models\subCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function index()
    {
        $categories=Categorie::all();
                
        return view('back.pages.super.categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie= new Categorie();
        
        $familySelected=Familie::pluck('label_family', 'id');

        return view('back.pages.super.categorie.create', compact('categorie', 'familySelected'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // Validation des données
        $request->validate([
            'label_categorie' => 'required|string|max:255|unique:categories,label_categorie',
            'describ_categorie' => 'required|string|max:255',
            'path_categorie' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
        ]);

        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_categorie')) {
            $path = $request->file('path_categorie')->store('Categories', 'public');
            $data['path_categorie'] = $path;
        }
        // dd($data);


        $categorie=Categorie::create($data);

        return response()->json([
            'message' => 'categorie created successfully!',
            'categorie' => $categorie
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
    public function edit(Categorie $categorie)
    {
        $familySelected=Familie::pluck('label_family', 'id');

        return view('back.pages.super.categorie.create', compact('categorie', 'familySelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        // Validation des données
        $request->validate([
            'label_categorie' => 'required|string|max:255',
            'describ_categorie' => 'required|string|max:255',
            'path_categorie' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mise à jour du rôle
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_categorie')) {
            $path = $request->file('path_categorie')->store('Categories', 'public');
            $data['path_categorie'] = $path;
        }
        $categorie->update($data);
        return redirect()->route('super.categorie.index');

        // return response()->json([
        //     'message' => 'famille updated successfully!',
        //     'categorie' => $categorie
        // ]);
    
    }

    public function delete(Categorie $categorie){

        return view('back.pages.super.categorie.delete', compact('categorie'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        
        return redirect()->route('super.categorie.index')->with('success', "Catégorie à été bien suprimer");
    }



    // Methode pour le Blogue D'enregistrement

    public function registCategorie(){
        $user=Auth::guard()->user();
        if(session()->has('key')){
            $familie=$user?->families->first();
        }else{
            $familie=Admin::find($user?->admin_id)?->families->first();
        }    
        $categories=$familie->categories;
       
        return view('back.pages.user.recorder.list-categorie', compact('categories'));
    }

    public function registSub(Categorie $categorie){

        $subCategories=subCategorie::where('categorie_id',$categorie->id)->get();
        if($categorie->label_categorie==='Tout les catégories'){
            $subCategories= subCategorie::all();
        }

        return view('back.pages.user.recorder.list-sub-categorie', compact('subCategories'));

    }

    public function registArticle(subCategorie $subCategorie){


    }




}
