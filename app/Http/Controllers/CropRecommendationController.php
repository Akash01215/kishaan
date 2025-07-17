<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\CropRecommendation;
use Illuminate\Http\Request;

class CropRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = CropRecommendation::all();
        return view('crop-recommendations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('crop-recommendations.create');
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
            'nitrogen' => 'required|numeric',
            'phosphorus' => 'required|numeric',
            'potassium' => 'required|numeric',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

         CropRecommendation::create([
            'user_id' => Auth::id(),
            'nitrogen' => $request->nitrogen,
            'phosphorus' => $request->phosphorus,
            'potassium' => $request->potassium,
            'city' => $request->city,
            'state' => $request->state,
            'recommended_crop' => null // ML se later update
        ]);

        return redirect()->route('crop-recommendations.index')->with('success', 'Data saved!');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CropRecommendation  $cropRecommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(CropRecommendation $cropRecommendation)
    {
         return view('crop-recommendations.edit', compact('cropRecommendation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CropRecommendation  $cropRecommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CropRecommendation $cropRecommendation)
    {
         $cropRecommendation->update($request->all());
        return redirect()->route('crop-recommendations.index')->with('success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CropRecommendation  $cropRecommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CropRecommendation $cropRecommendation)
    {
          $cropRecommendation->delete();
        return redirect()->route('crop-recommendations.index')->with('success', 'Deleted!');
    }
}
