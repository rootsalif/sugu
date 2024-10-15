<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Size;
use Illuminate\Http\Request;

class NumberController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numbers=Number::all();
        
        return view('back.pages.user.recorder.number.index', compact('numbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $number= new Number();

        $sizeSelected=Size::pluck('label_size', 'id');

        return view('back.pages.user.recorder.number.create', compact('number', 'sizeSelected'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_number' => 'required|numeric',
            'describ_number' => 'required|string|max:255',
            'path_number' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_number')) {
            $path = $request->file('path_number')->store('numbers', 'public');
            $data['path_number']= $path;
        }

        $number=Number::create($data);

        return redirect()->back()
            ->with('success', 'Number created successfully!')
            ->with('number', $number);


        // return response()->json([
        //     'message' => 'number created successfully!',
        //     'number' => $number
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
    public function edit(Number $number)
    {
        $sizeSelected=Size::pluck('label_size', 'id');

        
        return view('back.pages.user.recorder.number.create', compact('number', 'sizeSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Number $number)
    {
        $request->validate([
            'label_number' => 'required|numeric',
            'describ_number' => 'required|string|max:255',
            'path_number' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data=$request->all();

        // Gestion du fichier uploadé
        if ($request->hasFile('path_number')) {
            $path = $request->file('path_number')->store('numbers', 'public');
            $data['path_number']= $path;
        }

        $number->update($data);

        return redirect()->route('user.number.index')
            ->with('success', 'Number created successfully!')
            ->with('number', $number);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Number $number){

        return view('back.pages.user.recorder.number.delete', compact('number'));
    }
    public function destroy(Number $number)
    {
        $number->delete();
        
        return redirect()->route('user.number.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
