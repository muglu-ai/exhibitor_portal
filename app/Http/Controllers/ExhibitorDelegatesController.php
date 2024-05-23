<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use Illuminate\Http\Request;

class ExhibitorDelegatesController extends Controller
{
    //Get
    public function getExhibitorDelegate()
    {
        $exhibitor_id = 'EXH1234';
        // fetch all data of exhibitor where exhibitor_id is given in the request
        $exhibitordel = Exhibitor::where('exhibitor_id', $exhibitor_id)->first();

        return view('portal.pages.exhibitor_delegate', compact('exhibitordel'));
    }
    //Post
    public function postExhibitorDelegate(Request $request)
    {
        $exhibitordel = Exhibitor::create($request->all());

        return response()->json($exhibitordel, 201);
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
