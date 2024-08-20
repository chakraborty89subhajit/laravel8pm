<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        // Validate the request to ensure the file is an image
        $request->validate([
            'doc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if the file input 'doc' exists
        if ($request->hasFile('doc')) {
            // Store the file and get the path
            $status = $request->file('doc')->store('media');
            return response()->json(['status' => $status], 200);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }
}
