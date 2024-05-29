<?php

namespace App\Http\Controllers;

use App\Models\delegate_personal_info;
use App\Models\exhibitor_reg_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExhibitorDelegatesController extends Controller
{
    //Get
    public function getExhibitorDelegate(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        $delegate = delegate_personal_info::where('exhibitor_id', $exhibitor_id)->get();
        $delegate_count = $delegate->count();
        $exhibitor_detail = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        $exhibitor_del_count = $exhibitor_detail ? $exhibitor_detail->delegate_alloted : 0;

        return view('portal.pages.exhibitor_delegate', compact('delegate', 'exhibitor_detail', 'delegate_count', 'exhibitor_del_count'));
    }
    //Post
    public function postExhibitorDelegate(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'exhibitor_id' => 'required|string',
            'del_title' => 'required|string|max:30',
            'del_fname' => 'required|string|max:250',
            'del_lname' => 'required|string|max:250',
            'del_email' => 'required|string|email|max:255',
            'del_contact' => 'required|string|max:15',
            'del_designation' => 'required|string|max:250',
            'del_govtid_type' => 'required|string|max:250',
            'del_govtid_no' => 'required|string|max:250',
        ]);

        // Check if the exhibitor exists
        $exhibitor_id = $request->input('exhibitor_id');
        $tin_no = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->value('tin_no');

        if ($tin_no === null) {
            return redirect()->back()->with('error', 'Exhibitor not found.');
        }

        // Create a new instance of DelegatePersonalInfo
        $exhibitor = new delegate_personal_info();
        $exhibitor->exhibitor_id = $exhibitor_id;
        $exhibitor->tin_no = $tin_no;
        $exhibitor->del_title = $request->input('del_title');
        $exhibitor->del_fname = $request->input('del_fname');
        $exhibitor->del_lname = $request->input('del_lname');
        $exhibitor->del_email = $request->input('del_email');
        $exhibitor->del_contact = $request->input('del_contact');
        $exhibitor->del_designation = $request->input('del_designation');
        $exhibitor->del_govtid_type = $request->input('del_govtid_type');
        $exhibitor->del_govtid_no = $request->input('del_govtid_no');
        $exhibitor->del_type = 'Exhibitor Delegate';

        // Save the data
        $exhibitor->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Delegate added successfully.');
    }
}
