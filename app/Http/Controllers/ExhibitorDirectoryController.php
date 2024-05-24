<?php

namespace App\Http\Controllers;

use App\Models\exhibitor_directory;
use Illuminate\Http\Request;

class ExhibitorDirectoryController extends Controller
{
    //Get
    public function getExhibitorDirectory()
    {
        $directories = exhibitor_directory::all();
        return view("portal.pages.exhibitor_directory", compact("directories"));
    }
    //Update
    public function postExhibitorDirectory(Request $request)
    {
        // Validate the input data
        $request->validate([
            'org_name' => 'required|string|max:255',
            'fascia_name' => 'required|string|max:255',
            'org_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'org_profile' => 'required|mimes:pdf|max:10000',
        ]);

        // Handle file uploads
        if ($request->hasFile('org_logo') && $request->file('org_logo')->isValid()) {
            $orgLogoPath = $request->file('org_logo')->store('public/logos');
            $orgLogoName = basename($orgLogoPath);
        }

        if ($request->hasFile('org_profile') && $request->file('org_profile')->isValid()) {
            $orgProfilePath = $request->file('org_profile')->store('public/profiles');
            $orgProfileName = basename($orgProfilePath);
        }

        // Create a new exhibitor directory entry
        $directory = exhibitor_directory::create([
            'org_name' => $request->input('org_name'),
            'fascia_name' => $request->input('fascia_name'),
            'org_logo' => $orgLogoName,
            'org_profile' => $orgProfileName,
        ]);

        return response()->json($directory, 201);
    }
    //Update
    public function editExhibitorDirectory(Request $request, $exhibitor_id)
    {
        $exhibitor_id = "EXH1234";
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitor = exhibitor_directory::where('exhibitor_id', $exhibitor_id)->firstOrFail();
        $exhibitor->update($request->all());

        return response()->json($exhibitor, 200);
    }
}
