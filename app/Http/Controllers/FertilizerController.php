<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FertilizerController extends Controller
{
    public function showForm()
    {
        return view('frontend.form.fertilizer-form');
    }

  public function suggest(Request $req)
{
    $validated = $req->validate([
        'crop' => 'required|string',
        'N'    => 'required|numeric',
        'P'    => 'required|numeric',
        'K'    => 'required|numeric',
    ]);

    try {
        $client = new Client();
        $response = $client->post('http://127.0.0.1:5000/fertilizer', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'crop' => $validated['crop'],
                'N' => $validated['N'],
                'P' => $validated['P'],
                'K' => $validated['K'],
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        

        if (isset($data['status']) && $data['status'] === 'success') {
            $recommendations = $data['recommendations'];
        } else {
            $recommendations = [];
        }
    } catch (\Exception $e) {
        $recommendations = [];
    }

    return view('frontend.form.fertilizer-result', compact('recommendations'));
}

}