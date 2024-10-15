<?php


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Familie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
      
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familys=Familie::all();
                
        return view('back.pages.super.family.index', compact('familys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $family= new Familie();
        return view('back.pages.super.family.create', compact('family'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // Validation des données
        $request->validate([
            'label_family' => 'required|string|max:255|unique:families,label_family',
            'describ_family' => 'required|string|max:255',
            'path_family' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
        ]);


        // Création du rôle
        $family = new Familie();
        $family->superadmin_id= Auth::guard('superadmin')->user()->id;
        $family->label_family = $request->input('label_family');
        $family->describ_family = $request->input('describ_family');

        // Gestion du fichier uploadé
        if ($request->hasFile('path_family')) {
            $path = $request->file('path_family')->store('families', 'public');
            $family->path_family = $path;
        }

        $family->save();

        return response()->json([
            'message' => 'family created successfully!',
            'family' => $family
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
    public function edit(Familie $family)
    {
        
        return view('back.pages.super.family.create', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Familie $family)
    {
        // Validation des données
        $request->validate([
            'label_family' => 'required|string|max:255',
            'describ_family' => 'required|string|max:255',
            'path_family' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mise à jour du rôle
        $family->label_family = $request->input('label_family');
        $family->describ_family = $request->input('describ_family');

        // Gestion du fichier uploadé
        if ($request->hasFile('path_family')) {
            $path = $request->file('path_family')->store('families', 'public');
            $family->path_family = $path;
        }

        $family->save();
        return redirect()->route('super.family.index');

        // return response()->json([
        //     'message' => 'famille updated successfully!',
        //     'family' => $family
        // ]);
    
    }

    public function delete(Familie $family){

        return view('back.pages.super.family.delete', compact('family'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familie $family)
    {
        $family->delete();
        
        return redirect()->route('super.family.index')->with('success', "Fonctionalité à été bien suprimer");
    }


    // Add family on administrateur


    public function addIndex(){
        $families=Familie::all();
        $admins=Admin::has('families','>=',1)->get();

        return view('back.pages.super.family-add.index', compact('families', 'admins'));
    }


    public function adminShow(admin $admin){
        $families=$admin->families;

        return view('back.pages.super.family-add.show', compact('families', 'admin'));
    }

    public function addFamily(Familie $family){

        $admins=$family->admins;
        
        $adminSelected=Admin::pluck('name_admin', 'id');  

        return view('back.pages.super.family-add.add', compact('admins', 'family', 'adminSelected'));
    }

    public function storeFamily(Request $request, Familie $family){
        
        $request->validate([
            'admin_id'=>'required',
        ],[
            'admin_id.required'=>'Ce champ est requis',
        ]);

        $admin=admin::find($request->admin_id);

        $admin->families()->attach($family->id);
        
        return redirect()->back()->with('Admin à été bien associer sur '.$family->label_family);
    }
    public function dettach(Familie $family,admin $admin){      

        return view('back.pages.super.family-add.delete', compact('family','admin'));

    }
    public function storeDettach(Familie $family, admin $admin){

        $admin->families()->detach($family->id);

        return redirect()->route('super.admin.add.family',['family'=>$family]);
    }
}
