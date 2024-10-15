<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $components=Component::all();
        
        return view('back.pages.user.recorder.component.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $component= new Component();

        return view('back.pages.user.recorder.component.create', compact('component'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_component' => 'required|string|max:255|unique:components,label_component',
        ]);
        $data=$request->all();

        $component=Component::create($data);

        return redirect()->back()
            ->with('success', 'Component created successfully!')
            ->with('component', $component);


        // return response()->json([
        //     'message' => 'component created successfully!',
        //     'component' => $component
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
    public function edit(Component $component)
    {
        
        return view('back.pages.user.recorder.component.create', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Component $component)
    {
        $request->validate([
            'label_component' => 'required|string|max:255',
        ]);
        $data=$request->all();

        
        $component->update($data);

        return redirect()->route('user.component.index')
            ->with('success', 'Component created successfully!')
            ->with('component', $component);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Component $component){

        return view('back.pages.user.recorder.component.delete', compact('component'));
    }
    public function destroy(Component $component)
    {
        $component->delete();
        
        return redirect()->route('user.component.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
