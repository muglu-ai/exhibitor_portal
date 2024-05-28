<?php

namespace App\Http\Controllers;

use App\Models\delegate_personal_info;
use App\Models\delegate_registration;
use App\Models\Exhibitor;
use App\Models\exhibitor_reg_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExhibitorDelegatesController extends Controller
{
    //Get
    public function getExhibitorDelegate(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitordel = delegate_registration::where('exhibitor_id', $exhibitor_id)->first();
        $exhibitoradd1 = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();
        $exhibitoradd2 = delegate_personal_info::where('exhibitor_id', $exhibitor_id)->first();

        return view('portal.pages.exhibitor_delegate', compact('exhibitordel', 'exhibitoradd1', 'exhibitoradd2'));
    }
    //Post
    public function postExhibitorDelegate(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'exhibitor_id' => 'required|string',
            'del_name' => 'required|string|max:255',
            'del_email' => 'required|string|email|max:255',
            'del_contact' => 'required|string|max:20',
            'del_designation' => 'required|string|max:255',
            'del_govtid_type' => 'required|string|max:255',
            'del_govtid_no' => 'required|string|max:255',
        ]);

        // Fetch the exhibitor by exhibitor_id
        $exhibitor = delegate_registration::where('exhibitor_id', $request->input('exhibitor_id'))->first();

        // If the exhibitor does not exist, create a new one
        if (!$exhibitor) {
            $exhibitor = new delegate_registration();
            $exhibitor->exhibitor_id = $request->input('exhibitor_id');
        }

        // Loop through delegate slots to find an empty one and save the data
        $delegateAdded = false;
        for ($i = 1; $i <= 6; $i++) {
            if (empty($exhibitor->{'del' . $i . '_name'})) {
                $exhibitor->{'del' . $i . '_name'} = $request->input('del_name');
                $exhibitor->{'del' . $i . '_email'} = $request->input('del_email');
                $exhibitor->{'del' . $i . '_contact'} = $request->input('del_contact');
                $exhibitor->{'del' . $i . '_designation'} = $request->input('del_designation');
                $exhibitor->{'del' . $i . '_govtid_type'} = $request->input('del_govtid_type');
                $exhibitor->{'del' . $i . '_govtid_no'} = $request->input('del_govtid_no');
                $delegateAdded = true;
                break;
            }
        }

        if (!$delegateAdded) {
            return redirect()->back()->with('error', 'All delegate slots are filled.');
        }

        // Save the updated or new exhibitor
        $exhibitor->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Delegate added successfully.');
    }

    //Update
    public function updateExhibitorDelegate(Request $request)
    {
        $exhibitor_id = $request->session()->get('exhibitor_id');
        $exhibitordel = Exhibitor::where('exhibitor_id', $exhibitor_id)->firstOrFail();
        $exhibitordel->update($request->all());

        return response()->json($exhibitordel, 200);
    }
}
