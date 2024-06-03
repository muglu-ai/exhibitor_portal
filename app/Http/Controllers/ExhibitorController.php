<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitorLogin;
use App\Models\delegate_personal_info;
use Illuminate\Http\Request;
use App\Models\exhibitor_reg_details;
use App\Models\exhibitor_stall_manning;
use Illuminate\Support\Facades\Log;

class ExhibitorController extends Controller
{
    public function view()
    {
        return view('portal.pages.dashboard');
    }
    public function getAllExhibitor()
    {
        $exhibitors = exhibitor_reg_details::all();
        return view('portal.pages.exhibitor');
    }

    //write a function to fetch all exhibitor data where exhibitor_id  is "EXH_123"
    public function getOneExhibitor(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        $exhibitor = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        $missingFields = $this->checkMissingFields($exhibitor);
        return view('portal.pages.exhibitor', compact('exhibitor', 'missingFields'));
    }

    public function postExhibitor(Request $request)
    {
        $data = $request->all(); // Retrieve all the input data
        $exhibitor = exhibitor_reg_details::create($data); // Create a new record in the table
        return response()->json($exhibitor, 201); // Return the created record with a 201 status code

    }
    private function checkMissingFields($exhibitor)
    {
        // Fields that are considered required
        $requiredFields = [
            'org_name',
            'org_type',
            'sector',
            'address1',
            'city',
            'state',
            'country',
            'zip_code',
            'cp_title',
            'cp_fname',
            'cp_lname',
            'cp_designation',
            'cp_mobile',
            'website',
            'gst_number',
            'pan_number',
            'sales_executive'
        ];

        // Check if any required field is empty
        foreach ($requiredFields as $field) {
            if (empty($exhibitor->$field)) {
                return true; // Return true if any required field is empty
            }
        }

        return false; // Return false if all required fields are filled
    }

    public function update(Request $request, $exhibitor_id)
    {
        $exhibitor = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        // Update the exhibitor information
        $exhibitor->update($request->all());

        return redirect()->back()->with('success', 'Exhibitor information updated successfully!');
    }

    public function getExhibitorData(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        Log::info($exhibitor_id);

        if (!$exhibitor_id) {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }

        $exhibitordetail = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        $delegates = delegate_personal_info::where('exhibitor_id', $exhibitor_id)->get();
        $delegate_count = count($delegates);
        $stall_manning = exhibitor_stall_manning::where('exhibitor_id', $exhibitor_id)->get();
        $stall_manning_count = count($stall_manning);

        if (!$exhibitordetail) {
            return redirect()->route('dashboard')->with('error', 'Exhibitor not found.');
        }

        // Pass exhibitordetail to the dashboard view
        return view('portal.pages.dashboard', compact('exhibitordetail', 'delegate_count', 'stall_manning_count'));
    }
}
