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
        $directories = exhibitor_directory::create($request->all());
        return response()->json($directories, 201);
    }
    //Update
    public function editExhibitorDirectory(Request $request, $exhibitor_id)
    {
        $exhibitor_id = "EXH_123";
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitor = exhibitor_directory::where('exhibitor_id', $exhibitor_id)->firstOrFail();
        $exhibitor->update($request->all());

        return response()->json($exhibitor, 200);
    }
}
