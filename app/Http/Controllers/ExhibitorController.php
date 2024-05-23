<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitorLogin;
use Illuminate\Http\Request;
use App\Models\exhibitor_reg_table;


class ExhibitorController extends Controller
{
    public function view()
    {
        return view('portal.pages.dashboard');
    }
    public function getAllExhibitor()
    {
        $exhibitors = exhibitor_reg_table::all();
        return view('portal.pages.exhibitor');
    }

    //write a function to fetch all exhibitor data where exhibitor_id  is "EXH_123"
    public function getOneExhibitor(Request $request)
    {
        $exhibitor_id = "EXH1234";
        $exhibitor = exhibitor_reg_table::where('exhibitor_id', $exhibitor_id)->first();
        return view('portal.pages.exhibitor' , compact('exhibitor'));
    }

    public function postExhibitor(Request $request)
    {
        $data = $request->all(); // Retrieve all the input data
        $exhibitor = exhibitor_reg_table::create($data); // Create a new record in the table
        return response()->json($exhibitor, 201); // Return the created record with a 201 status code

    }

    public function updateExhibitor(Request $request)
    {
        $exhibitor_id = "EXH_123";
        // Find the exhibitor by exhibitor_id
        $exhibitor = exhibitor_reg_table::where('exhibitor_id', $exhibitor_id)->firstOrFail();

        // Update the exhibitor with the data from the request
        $exhibitor->update($request->all());

        // Return the updated exhibitor and a 200 status code
        return response()->json($exhibitor, 200);
    }
}
