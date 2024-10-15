<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes=Size::all();
        
        return view('back.pages.user.recorder.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $size= new Size();

        return view('back.pages.user.recorder.size.create', compact('size'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
        $request->validate([
            'label_size' => 'required|string|max:255|unique:sizes,label_size',
        ]);
        $data=$request->all();

        $size=Size::create($data);

        return redirect()->back()
            ->with('success', 'Size created successfully!')
            ->with('size', $size);


        // return response()->json([
        //     'message' => 'size created successfully!',
        //     'size' => $size
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
    public function edit(Size $size)
    {
        
        return view('back.pages.user.recorder.size.create', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'label_size' => 'required|string|max:255',
        ]);
        $data=$request->all();

        
        $size->update($data);

        return redirect()->route('user.size.index')
            ->with('success', 'Size created successfully!')
            ->with('size', $size);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Size $size){

        return view('back.pages.user.recorder.size.delete', compact('size'));
    }
    public function destroy(Size $size)
    {
        $size->delete();
        
        return redirect()->route('user.size.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
