<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'doc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Check if the file input 'doc' exists
        //if ($request->hasFile('doc')) {
            // Store the file and get the path
            $status = $request->file('doc')->store('media');
            return $status;
      //  } else {
          //  return response()->json(['error' => 'No file uploaded'], 400);
        //}
    }
}
