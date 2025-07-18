<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\DiseaseReport;
use Illuminate\Http\Request;

class DiseaseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DiseaseReport::all();
        return view('disease-reports.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disease-reports.create');
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
            'image_path' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('disease_images', 'public');
        }

        DiseaseReport::create([
            'user_id' => Auth::id(),
            'crop_name' => $request->crop_name,
            'disease_detected' => null, // Will be added by ML later
            'image_path' => $imagePath,
            'cure_suggestion' => null,
            'submitted_at' => now()
        ]);

        return redirect()->route('disease-reports.index')->with('success', 'Report submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiseaseReport  $diseaseReport
     * @return \Illuminate\Http\Response
     */
    public function show(DiseaseReport $diseaseReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiseaseReport  $diseaseReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DiseaseReport $diseaseReport)
    {
        return view('disease-reports.edit', compact('diseaseReport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiseaseReport  $diseaseReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiseaseReport $diseaseReport)
    {
        $diseaseReport->update($request->all());
        return redirect()->route('disease-reports.index')->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiseaseReport  $diseaseReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiseaseReport $diseaseReport)
    {
         $diseaseReport->delete();
        return redirect()->route('disease-reports.index')->with('success', 'Deleted!');
    }
}
