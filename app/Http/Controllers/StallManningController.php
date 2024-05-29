<?php

namespace App\Http\Controllers;

use App\Models\exhibitor_reg_details;
use App\Models\exhibitor_stall_manning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StallManningController extends Controller
{
    public function getStallManning(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        $exhibitor_sm = exhibitor_stall_manning::where('exhibitor_id', $exhibitor_id)->get();
        $stall_manning_count = $exhibitor_sm->count();
        $exhibitor_detail = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        $sm_count = $exhibitor_detail ? $exhibitor_detail->sm_count : 0;

        return view('portal.pages.stallManning', compact('exhibitor_sm', 'exhibitor_detail', 'stall_manning_count', 'sm_count'));
    }


    public function postStallManning(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'exhibitor_id' => 'required|string',
            'sm_title' => 'required|string|max:30',
            'sm_fname' => 'required|string|max:250',
            'sm_lname' => 'required|string|max:250',
            'sm_email' => 'required|string|email|max:250',
            'sm_designation' => 'required|string|max:250',
            'sm_mobile' => 'required|string|max:15',
            'sm_govt_id_type' => 'required|string|max:250',
            'sm_govt_id_number' => 'required|string|max:250',
        ]);

        $exhibitor_id = $request->input('exhibitor_id');
        $org_name = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->value('org_name');

        $exhibitor = new exhibitor_stall_manning();
        $exhibitor->exhibitor_id = $exhibitor_id;
        $exhibitor->org_name = $org_name;
        $exhibitor->sm_title = $request->input('sm_title');
        $exhibitor->sm_fname = $request->input('sm_fname');
        $exhibitor->sm_lname = $request->input('sm_lname');
        $exhibitor->sm_email = $request->input('sm_email');
        $exhibitor->sm_designation = $request->input('sm_designation');
        $exhibitor->sm_mobile = $request->input('sm_mobile');
        $exhibitor->sm_govt_id_type = $request->input('sm_govt_id_type');
        $exhibitor->sm_govt_id_number = $request->input('sm_govt_id_number');
        // Save the new exhibitor stall manning
        $exhibitor->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Stall Manning details added successfully.');
    }
}
