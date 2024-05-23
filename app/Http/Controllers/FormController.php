<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;
use Stidges\CountryFlags\CountryFlag;
use App\Models\Country;
use Mews\Captcha\Captcha;
use App\Http\Requests\ExhibitorRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Exhibitors;



class FormController extends Controller
{
    //exhibitor view
    public function form(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $countries2 = Country::paginate(10);
//       country_flag('IN');
        $countries = CountryListFacade::getList('en');


        return view('exhibitor.create',['countries2' => $countries2], compact('countries',  ));
    }

    public function showCountryFlags(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Paginate the countries
        $countries = Country::paginate(10);

        // Pass the paginated countries to the view
        return view('country-flags', ['countries' => $countries]);
    }

    //exhibitor submit
    public function submit(ExhibitorRequest $request)
    {
         //generate exhibitor id here
        $exhibitor_id = 'EXH'.rand(1000,9999);
         // Add the exhibitor_id to the request data
        $request->merge(['exhibitor_id' => $exhibitor_id]);
        Log::info($request->all());

        try {
            $exhibitor = Exhibitors::create($request->validated());

            // Optionally, you can return a success response
            return response()->json(['message' => 'Exhibitor created successfully', 'exhibitor' => $exhibitor], 201);
        } catch (\Exception $e) {
            // Handle any exceptions, such as database errors
            return response()->json(['error' => 'Failed to create exhibitor', 'message' => $e->getMessage()], 500);
        }

    }
    public function submit2(Request $request)
    {
        Log::info($request->all());
        Exhibitor::create($request->all());
    }


    public function generateCaptcha()
    {
        $captcha = new Captcha();
        return $captcha->create('default', true);
    }

    public function validateCaptcha(Request $request)
{
    $request->validate([
        'captcha' => 'required|captcha',
    ]);

    // CAPTCHA is valid, proceed with your logic
}


}
