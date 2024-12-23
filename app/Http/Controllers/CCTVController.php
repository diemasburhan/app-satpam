<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CCTVController extends Controller
{
    public function index()
    {
        // Dummy data kamera untuk testing
        $cameras = [
            ['id' => 1, 'name' => 'Kamera 1', 'stream_url' => 'https://www.youtube.com/watch?v=kPa7bsKwL-c'],
            ['id' => 2, 'name' => 'Kamera 2', 'stream_url' => 'http://cctv-server-url/camera2'],
        ];

        return view('cctv.index', compact('cameras'));
    }
}
