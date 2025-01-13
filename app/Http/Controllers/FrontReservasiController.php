<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontReservasiController extends Controller
{
    public function index()
    {
        // Fetch doctor data from API
        $response = Http::get('https://supri-reservasi.test/api/records/dokters');

        if ($response->successful()) {
            // Pass the doctors' data to the view
            $doctors = $response->json()['records'];
            return view('reservasi', ['doctors' => $doctors]);
        }

        // If there is an error or no data, pass an empty array
        return view('reservasi', ['doctors' => []]);
    }
}
