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
        $phrases = Phrase::all();
        return view('home', compact('phrases'));
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
    public function show($id)
    {
        $phrase = Phrase::find($id);
        return view('show', compact('phrase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phrase = Phrase::find($id);
        return view('edit', compact('phrase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phrase  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phrase = Phrase::find($id);
        $phrase->update([
            'phrase' => $request->phrase,
            'author' => $request->author,
            'image' => $request->image
        ]);
        return redirect()->route('show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phrase = Phrase::find($id);
        $phrase->delete();
        return redirect()->route('home');
    }
}
