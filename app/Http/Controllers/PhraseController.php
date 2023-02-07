<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //llamamos a todas las phrases
        $phrases = Phrase::all();
        return view('welcome', compact('phrases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phrase = Phrase::create([
            'phrase' => $request->phrase,
            'author' => $request->author,
            'image' => $request->image
        ]);

        $phrase->save();
        return redirect()->route('show', $phrase->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function show(Phrase $phrase, $id)
    {
        $phrase = Phrase::find($id);
        return view('show', compact(['phrase', 'id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function edit(Phrase $phrase)
    {
        $id = $phrase->id;
        $author = $phrase->author;
        $image = $phrase->image;
        $phrase = Phrase::find($id);
        return view('edit', compact(['phrase', 'id', 'author', 'image']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phrase $phrase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phrase $phrase)
    {
        //
    }
}
