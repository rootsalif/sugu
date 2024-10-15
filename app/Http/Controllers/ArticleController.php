<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\subCategorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Blogue Enregistrement

    public function registDetail(){

        return view('back.pages.user.recorder.article.detail-article');

    }
    /**
     * Display a listing of the resource.
     */
    public function index(subCategorie $subCategorie)
    {
        $articles=Article::all();
        
        return view('back.pages.user.recorder.article.index', compact('articles', 'subCategorie'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
