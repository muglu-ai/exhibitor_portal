<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class DelegateController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {

        $countries2 = Country::paginate(10);
       // $countries = CountryListFacade::getList('en');
        $organisation = $this->organisation();
        $sector = $this->sectorList();
        $delegates = $this->no_of_delegates();
        return view('delegate.create',['countries2' => $countries2], compact( 'organisation','sector','delegates'));
    }

    /*
    *List of Type Organisation
    */
    private function organisation()
    {
        $organisation = array('Startup' => 'Startup', 'MSME' => 'MSME', 'Corporate / Industry' => 'Corporate / Industry',
        'R&D Labs' => 'R&D Labs',  'Investors' => 'Investors', 'Government' => 'Government', 'Industry Associations' => 'Industry Associations',
        'Consulting' => 'Consulting', 'Trade Mission' => 'Trade Mission', 'Others' => 'Others');
        return $organisation;
    }
    /**
     * List of Sectors.
     */
    private function sectorList()
    {
        $sector = array('Information Technology' => 'Information Technology', 'Electronics' => 'Electronics', 'Biotechnology' => 'Biotechnology', 'Startup' => 'Startup', 'Academia & University (not for Student Only Faculty and HOD)' => 'Academia & University (not for Student Only Faculty and HOD)', 'Others' => 'Others');
        return $sector;
    }

    private function no_of_delegates()
    {
        $delegates = 5;
        return $delegates;
    }



    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
