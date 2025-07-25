<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiseaseDescription; 
use GuzzleHttp\Client;

class DiseaseController extends Controller
{
    public function form()
    {
        return view('frontend.form.disease-form');
    }

  public function detect(Request $request)
{
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Send to Flask
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://127.0.0.1:5000/predict', [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($image->getPathname(), 'r'),
                    'filename' => $image->getClientOriginalName(),
                ],
            ],
        ]);

        $result = json_decode($response->getBody(), true);
        $fullInfoMultilingual = $result['full_info_multilingual'] ?? [];

        // Check if disease with same label already exists
        $existingDisease = DiseaseDescription::where('label', $result['label'] ?? 'Unknown')->first();

        if ($existingDisease) {
            // Just return existing record
            return view('frontend.form.disease-result', [
                'disease' => $existingDisease,
                'fullInfoMultilingual' => $fullInfoMultilingual
            ]);
        }

        // Else store new disease
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);
        $imagePath = 'uploads/' . $imageName;

        $disease = DiseaseDescription::create([
            'label' => $result['label'] ?? 'Unknown',
            'title' => $result['title'] ?? ($fullInfoMultilingual['english']['title'] ?? 'No title'),
            'description' => $result['description'] ?? ($fullInfoMultilingual['english']['description'] ?? 'No description'),
            'treatment' => $result['treatment'] ?? ($fullInfoMultilingual['english']['treatment'] ?? 'No treatment available'),
            'confidence' => $result['confidence'] ?? null,
            'image_path' => $imagePath,
        ]);

        return view('frontend.form.disease-result', [
            'disease' => $disease,
            'fullInfoMultilingual' => $fullInfoMultilingual
        ]);
    }

    return back()->with('error', 'Image not uploaded!');
}
}