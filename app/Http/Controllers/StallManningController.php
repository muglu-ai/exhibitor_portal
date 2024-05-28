<?php

namespace App\Http\Controllers;

use App\Models\exhibitor_stall_manning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StallManningController extends Controller
{
    public function getStallManning(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitorsm = exhibitor_stall_manning::where('exhibitor_id', $exhibitor_id)->first();

        return view('portal.pages.stallManning', compact('exhibitorsm'));
    }
    // public function postStallManning(Request $request)
    // {
    //     $rules = [
    //         'org_name' => 'required|string|max:255',
    //         'sm1_name' => 'required|string|max:255',
    //         'sm1_email' => 'required|email|max:255',
    //         'sm1_designation' => 'required|string|max:255',
    //         'sm1_mobile' => 'required|string|max:255',
    //         'sm1_govt_id_type' => 'required|string|max:255',
    //         'sm1_govt_id_number' => 'required|string|max:255',
    //     ];

    //     $validatedData = $request->validate($rules);

    //     $validatedData['exhibitor_id'] = 'EXH1235';

    //     $exhibitor = exhibitor_stall_manning::create($validatedData);

    //     return response()->json($exhibitor, 201);
    // }
    public function postStallManning(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'exhibitor_id' => 'required|string',
            'sm_name' => 'required|string|max:255',
            'sm_email' => 'required|string|email|max:255',
            'sm_designation' => 'required|string|max:255',
            'sm_mobile' => 'required|string|max:20',
            'sm_govt_id_type' => 'required|string|max:50',
            'sm_govt_id_number' => 'required|string|max:50',
        ]);

        // Retrieve the exhibitor by ID
        $exhibitor = exhibitor_stall_manning::where('exhibitor_id', $request->input('exhibitor_id'))->first();

        if (!$exhibitor) {
            // If exhibitor does not exist, create a new one
            $exhibitor = new exhibitor_stall_manning();
            $exhibitor->exhibitor_id = $request->input('exhibitor_id');
        }

        // Determine the next available stall manning slot
        for ($i = 1; $i <= 5; $i++) {
            if (empty($exhibitor->{'sm' . $i . '_name'})) {
                // Assign the new stall manning details to the next available slot
                $exhibitor->{'sm' . $i . '_name'} = $request->input('sm_name');
                $exhibitor->{'sm' . $i . '_email'} = $request->input('sm_email');
                $exhibitor->{'sm' . $i . '_designation'} = $request->input('sm_designation');
                $exhibitor->{'sm' . $i . '_mobile'} = $request->input('sm_mobile');
                $exhibitor->{'sm' . $i . '_govt_id_type'} = $request->input('sm_govt_id_type');
                $exhibitor->{'sm' . $i . '_govt_id_number'} = $request->input('sm_govt_id_number');
                break;
            }
        }

        // Save the updated or new exhibitor
        $exhibitor->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Stall Manning details added successfully.');
    }


    //Edit function
    public function updateStallManning(Request $request, $exhibitor_id)
    {
        // Validate the incoming request
        $request->validate([
            'index' => 'required|integer',
            'sm_name' => 'required|string|max:255',
            'sm_email' => 'required|string|email|max:255',
            'sm_designation' => 'required|string|max:255',
            'sm_mobile' => 'required|string|max:20',
            'sm_govt_id_type' => 'required|string|max:50',
            'sm_govt_id_number' => 'required|string|max:50',
        ]);

        // Retrieve the exhibitor by ID
        $exhibitor = exhibitor_stall_manning::where('exhibitor_id', 'EXH1234')->first();

        if ($exhibitor) {
            // Update stall manning details based on the provided index
            $index = $request->input('index');
            $exhibitor->{'sm' . $index . '_name'} = $request->input('sm_name');
            $exhibitor->{'sm' . $index . '_email'} = $request->input('sm_email');
            $exhibitor->{'sm' . $index . '_designation'} = $request->input('sm_designation');
            $exhibitor->{'sm' . $index . '_mobile'} = $request->input('sm_mobile');
            $exhibitor->{'sm' . $index . '_govt_id_type'} = $request->input('sm_govt_id_type');
            $exhibitor->{'sm' . $index . '_govt_id_number'} = $request->input('sm_govt_id_number');

            // Save the updated exhibitor
            $exhibitor->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Stall Manning details updated successfully.');
        }

        // Redirect back with an error message if exhibitor is not found
        return redirect()->back()->with('error', 'Exhibitor not found.');
    }
}
