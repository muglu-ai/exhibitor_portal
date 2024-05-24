<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\exhibitor_reg_table;
use App\Models\user_login_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        //sector
        $sectors = $this->sectorList();


        return view('exhibitor.create', compact('countries','sectors'  ));
    }

    //List of sector
    private function sectorList()
    {
        $sector = array('Information Technology' => 'Information Technology', 'Electronics' => 'Electronics', 'Biotechnology' => 'Biotechnology', 'Startup' => 'Startup', 'Academia & University (not for Student Only Faculty and HOD)' => 'Academia & University (not for Student Only Faculty and HOD)', 'Others' => 'Others');
        return $sector;
    }

    public function showCountryFlags(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Paginate the countries
        $countries = Country::paginate(10);

        // Pass the paginated countries to the view
        return view('country-flags', ['countries' => $countries]);
    }

    //exhibitor submit
    public function submit(Request $request)
    {
        $rules = [
            'booth_size' => 'required|string',
            'sector' => 'required|string',
            'exhibitor_name' => 'required|string',
            'company_reg' => 'required|file|mimes:pdf',
            'invoice_add' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string|max:10',
            'con_number' => 'required|string',
            'gst_reg' => 'required|string',
            'gst_number' => 'nullable|string',
            'pan_number' => 'required|string',
            'cp_title' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'cp_design' => 'required|string',
            'cp_email' => 'required|email',
            'cp_con_number' => 'required|string',
            'website' => 'required|string',
            'payment_mode' => 'required|string',
            'captcha' => 'required|string',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'error validation' => $validator->errors()
            ], 422);
        }

        // Handle file upload
        if ($request->hasFile('company_reg')) {
            $file = $request->file('company_reg');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
            $company_reg = $filename;
            Log::info($company_reg);
        } else {
            $company_reg = null;
        }
        //exhibitor_id generate here
        $exhibitor_id = 'EXH' . rand(1000, 9999);
        // Map form data to model fields
        $exhibitorData = [
            'exhibitor_id' => $exhibitor_id,
            'booth_size' => $request->booth_size,
            'sector' => $request->sector,
            'org_name' => $request->exhibitor_name,
            'org_reg_certificate' => $company_reg,
            'address1' => $request->invoice_add,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip_code' => $request->zip,
            'cp_name' => $request->cp_title . ' ' . $request->first_name . ' ' . $request->last_name,
            'cp_email' => $request->cp_email,
            'cp_designation' => $request->cp_design,
            'cp_mobile' => $request->cp_con_number,
            'website' => $request->website,
            'gst_details' => $request->gst_reg,
            'gst_number' => $request->gst_number,
            'pan_number' => $request->pan_number,
            'paymode' => $request->payment_mode,
        ];

        // Create a new exhibitor record
        $exhibitor = exhibitor_reg_table::create($exhibitorData);
        //generate random password of 8 characters
        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
        //create login details for exhibitor in user_login_table
        $loginData = [
            'exhibitor_id' => $exhibitor_id,
            'email' => $request->cp_email,
            'password' => bcrypt($password),
            'password_actual'=> $password,
            'captcha' => $request->captcha,
        ];
        $login = user_login_table::create($loginData);
        session(['exhibitor_id' => $exhibitor->exhibitor_id]);
        // Return to previewExhibitor with $exhibitor_id
        return redirect()->route('preview.exhibitor');


        /*return response()->json([
            'message' => 'Exhibitor submitted successfully with login details',
            'exhibitor' => $exhibitor
        ], 201);*/
    }

    //preview exhibitor
    public function previewExhibitor()
    {
        $id = session('exhibitor_id');
        $exhibitor = exhibitor_reg_table::find($id);
        return view('exhibitor.preview', compact('exhibitor'));
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

   /* public function validateCaptcha(Request $request)
{
    $request->validate([
        'captcha' => 'required|captcha',
    ]);

    // CAPTCHA is valid, proceed with your logic
}
*/

}
