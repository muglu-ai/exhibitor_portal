<?php

namespace App\Http\Controllers;

use App\Models\delegate_registration;
use App\Models\Exhibitor;
use App\Models\exhibitor_reg_table;
use Illuminate\Http\Request;

class ExhibitorDelegatesController extends Controller
{
    //Get
    public function getExhibitorDelegate()
    {
        $exhibitor_id = 'EXH1234';
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitordel = delegate_registration::where('exhibitor_id', $exhibitor_id)->first();
        $exhibitoradd = exhibitor_reg_table::where('exhibitor_id', $exhibitor_id)->first();

        return view('portal.pages.exhibitor_delegate', compact('exhibitordel', 'exhibitoradd'));
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
            // Add validation rules for other delegates
        ]);

        // Check if exhibitor exists, otherwise create a new one
        // $exhibitor = delegate_registration::firstOrCreate(['exhibitor_id' => $request->input('exhibitor_id')]);
        $exhibitor = delegate_registration::where('exhibitor_id', $request->input('exhibitor_id'))->first();

        if (!$exhibitor) {
            // If exhibitor does not exist, create a new one
            $exhibitor = new delegate_registration();
            $exhibitor->exhibitor_id = $request->input('exhibitor_id');
        }

        // Determine the next available stall manning slot
        for ($i = 1; $i <= 5; $i++) {
            if (empty($exhibitor->{'del' . $i . '_name'})) {
                // Assign the new stall manning details to the next available slot
                $exhibitor->{'del' . $i . '_name'} = $request->input('del_name');
                $exhibitor->{'del' . $i . '_email'} = $request->input('del_email');
                // $exhibitor->{'del' . $i . '_designation'} = $request->input('del_designation');
                $exhibitor->{'del' . $i . '_contact'} = $request->input('del_contact');
                break;
            }
        }

        // Save the updated or new exhibitor
        $exhibitor->save();
        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Delegates added successfully.');
    }
    //Update
    public function updateExhibitorDelegate(Request $request)
    {
        $exhibitor_id = "EXH_123";
        $exhibitordel = Exhibitor::where('exhibitor_id', $exhibitor_id)->firstOrFail();
        $exhibitordel->update($request->all());

        return response()->json($exhibitordel, 200);
    }
}
