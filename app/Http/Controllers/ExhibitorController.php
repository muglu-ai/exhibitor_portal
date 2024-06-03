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
        return view('portal.pages.exhibitor', compact('exhibitor'));
    }

    public function postExhibitor(Request $request)
    {
        $data = $request->all(); // Retrieve all the input data
        $exhibitor = exhibitor_reg_details::create($data); // Create a new record in the table
        return response()->json($exhibitor, 201); // Return the created record with a 201 status code

    }

    public function updateExhibitor(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        // Find the exhibitor by exhibitor_id
        $exhibitor = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->firstOrFail();

        // Update the exhibitor with the data from the request
        $exhibitor->update($request->all());

        // Return the updated exhibitor and a 200 status code
        return response()->json($exhibitor, 200);
    }
    public function getExhibitorData(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');

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
