<?php

namespace App\Http\Controllers;

use App\Models\exhibitor_directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExhibitorDirectoryController extends Controller
{
    //Get
    public function getExhibitorDirectory(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        $directories = exhibitor_directory::where('exhibitor_id', $exhibitor_id)->first();
        return view("portal.pages.exhibitor_directory", compact('directories'));
    }
    public function postExhibitorDirectory(Request $request)
{
    try {
        // Validate the input data
        $request->validate([
            'fascia_name' => 'required|string|max:255',
            'org_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile' => 'required|string|max:10000',
        ]);

        // Retrieve exhibitor ID from session
        $exhibitorId = $request->file('exhibitor_id');

        // Handle file uploads
        $orgLogoFile = $request->file('org_logo');
        Log::info('Uploaded org logo file: '.$orgLogoFile->getClientOriginalName().' ('.$orgLogoFile->getClientMimeType().')');
        $orgLogoPath = $orgLogoFile->store('public/logos');
        $orgLogoName = basename($orgLogoPath);

        // Create a new exhibitor directory entry
        $directory = new exhibitor_directory();
        $directory->exhibitor_id = $exhibitorId;
        $directory->org_logo = $orgLogoName;
        $directory->org_profile = $request->input('profile');
        $directory->save();

        // Log success message
        Log::info('Exhibitor directory entry created successfully.');

        // Optionally, you can return a response or redirect
        return response()->json($directory, 201);
    } catch (\Exception $e) {
        // Log the error message and stack trace
        Log::error('Error creating exhibitor directory entry: '.$e->getMessage());
        Log::error($e->getTraceAsString());

        // Optionally, you can return an error response
        return response()->json(['error' => 'Failed to create exhibitor directory entry.'], 500);
    }
}

}
