<?php

namespace App\Http\Controllers;

use App\Models\exhibitor_stall_manning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StallManningController extends Controller
{
    public function getStallManning(Request $request)
    {
        $exhibitor_id = 'EXH1234';
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitorsm = exhibitor_stall_manning::where('exhibitor_id', $exhibitor_id)->first();

        return view('portal.pages.stallManning', compact('exhibitorsm'));
    }
    public function postStallManning(Request $request)
    {
        // Define validation rules
        $rules = [
            'org_name' => 'required|string|max:255',
            'sm1_name' => 'required|string|max:255',
            'sm1_email' => 'required|email|max:255',
            'sm1_designation' => 'required|string|max:255',
            'sm1_mobile' => 'required|string|max:255',
            'sm1_govt_id_type' => 'required|string|max:255',
            'sm1_govt_id_number' => 'required|string|max:255',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // Add exhibitor_id to the validated data
        $validatedData['exhibitor_id'] = 'EXH1235';

        // Create a new exhibitor_stall_manning record
        $exhibitor = exhibitor_stall_manning::create($validatedData);

        return response()->json($exhibitor, 201); // Return the created record with a 201 status code
    }

    //Edit function
    public function updateStallManning(Request $request, $exhibitor_id)
    {
        $exhibitor_id = "Exh_123";
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitor = exhibitor_stall_manning::where('exhibitor_id', $exhibitor_id)->firstOrFail();
        Log::info($request);
        $exhibitor->update($request->all());

        return response()->json($exhibitor, 200);
    }
}
