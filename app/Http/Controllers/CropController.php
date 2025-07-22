<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CropController extends Controller
{
    public function showForm()
    {
        return view('frontend.form.crop-form');
    }

    public function recommend(Request $request)
    {
        // Validation form ke input names ke hisaab se
        $validated = $request->validate([
            'N' => 'required|numeric',
            'P' => 'required|numeric',
            'K' => 'required|numeric',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'ph' => 'required|numeric',
            'rainfall' => 'required|numeric',
        ]);

        try {
            $client = new Client();

            $apiUrl = 'http://127.0.0.1:5000/predict';

            $response = $client->post($apiUrl, [
                'json' => [
                    'N' => $validated['N'],
                    'P' => $validated['P'],
                    'K' => $validated['K'],
                    'temperature' => $validated['temperature'],
                    'humidity' => $validated['humidity'],
                    'ph' => $validated['ph'],
                    'rainfall' => $validated['rainfall'],
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] == 'success') {
                $result = "Recommended Crop: " . $data['recommended_crop'];
            } else {
                $result = "API Error: " . ($data['message'] ?? 'Unknown error');
            }
        } catch (\Exception $e) {
            $result = "API Connection Error: " . $e->getMessage();
        }

        return view('frontend.form.crop-result', compact('result'));
    }
}
