<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\FertilizerSuggestion;
use Illuminate\Http\Request;

class FertilizerSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FertilizerSuggestion::all();
        return view('fertilizer-suggestions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('fertilizer-suggestions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string',
            'nitrogen' => 'required|numeric',
            'phosphorus' => 'required|numeric',
            'potassium' => 'required|numeric',
        ]);

        FertilizerSuggestion::create([
            'user_id' => Auth::id(),
            'crop_name' => $request->crop_name,
            'nitrogen' => $request->nitrogen,
            'phosphorus' => $request->phosphorus,
            'potassium' => $request->potassium,
            'deficiency' => null,  // will be filled later by ML
            'suggested_action' => null
        ]);

        return redirect()->route('fertilizer-suggestions.index')->with('success', 'Suggestion stored!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FertilizerSuggestion  $fertilizerSuggestion
     * @return \Illuminate\Http\Response
     */
    public function show(FertilizerSuggestion $fertilizerSuggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FertilizerSuggestion  $fertilizerSuggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(FertilizerSuggestion $fertilizerSuggestion)
    {
        return view('fertilizer-suggestions.edit', compact('fertilizerSuggestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FertilizerSuggestion  $fertilizerSuggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FertilizerSuggestion $fertilizerSuggestion)
    {
        $fertilizerSuggestion->update($request->all());
        return redirect()->route('fertilizer-suggestions.index')->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FertilizerSuggestion  $fertilizerSuggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(FertilizerSuggestion $fertilizerSuggestion)
    {
       $fertilizerSuggestion->delete();
        return redirect()->route('fertilizer-suggestions.index')->with('success', 'Deleted!');
    }
}
