<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques=Marque::all();
        
        return view('back.pages.user.recorder.marque.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $marque= new Marque();

        return view('back.pages.user.recorder.marque.create', compact('marque'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_marque' => 'required|string|max:255|unique:marques,label_marque',
            'describ_marque' => 'required|string|max:255',
            'path_marque' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_marque')) {
            $path = $request->file('path_marque')->store('marques', 'public');
            $data['path_marque']= $path;
        }

        $marque=Marque::create($data);

        return redirect()->back()
            ->with('success', 'Marque created successfully!')
            ->with('marque', $marque);


        // return response()->json([
        //     'message' => 'marque created successfully!',
        //     'marque' => $marque
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
    public function edit(Marque $marque)
    {
        
        return view('back.pages.user.recorder.marque.create', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            'label_marque' => 'required|string|max:255',
            'describ_marque' => 'required|string|max:255',
            'path_marque' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_marque')) {
            $path = $request->file('path_marque')->store('marques', 'public');
            $data['path_marque']= $path;
        }

        $marque->update($data);

        return redirect()->route('user.marque.index')
            ->with('success', 'Marque created successfully!')
            ->with('marque', $marque);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Marque $marque){

        return view('back.pages.user.recorder.marque.delete', compact('marque'));
    }
    public function destroy(Marque $marque)
    {
        $marque->delete();
        
        return redirect()->route('user.marque.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
