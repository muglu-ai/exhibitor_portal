<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use App\Models\exhibitor_reg_details;
use App\Models\exhibitor_reg_table;
use App\Models\user_login_details;
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
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CashfreePaymentController;




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
        //country validation
        $country = 'INDIAN';
        $country = $this->currency($country);


        //tin number generation
        $tin = $this->generateTIN();

        //cost generation or selection amt
        $cost = $this->cost($request->booth_size);

        //tax calculation on cost
        $tax = $this->tax($cost);

        //total cost calculation
        $tot_cost = $cost + $tax;

        //processing charge calculation
        $processing_charge = $this->processingCharge($tot_cost);

        //total cost
        $total = ceil($tot_cost + $processing_charge);
        //delegate count and stall manning count
        $del_count = $this->delegateCount($request->booth_size);


        //exhibitor_id generate here
        $exhibitor_id = 'EXH' . rand(1000, 9999);
        // Map form data to model fields
        $exhibitorData = [
            'exhibitor_id' => $exhibitor_id,
            'user_type' => 'Startup Exhibitor',
            'booth_size' => $request->booth_size,
            'sector' => $request->sector,
            'org_name' => $request->exhibitor_name,
            'org_reg_certificate' => $company_reg,
            'address1' => $request->invoice_add,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zip_code' => $request->zip,
            'cp_title' => $request->cp_title,
            'cp_fname' => $request->first_name,
            'cp_lname' => $request->last_name,
//            'cp_name' => $request->cp_title . ' ' . $request->first_name . ' ' . $request->last_name,
            'cp_email' => $request->cp_email,
            'cp_designation' => $request->cp_design,
            'cp_mobile' => $request->cp_con_number,
            'website' => $request->website,
            'gst_details' => $request->gst_reg,
            'gst_number' => $request->gst_number,
            'pan_number' => $request->pan_number,
            'paymode' => $request->payment_mode,
            'selection_amount' => $cost,
            'pay_status' => 'Not Paid',
            'tin_no' => $tin,
            'total_amount' => $total,
            'processing_charge' => $processing_charge,
            'tax_amount' => $tax,
            'reg_date' => now(),
            'delegate_alloted' => $del_count[0],
            'sm_count' => $del_count[1],
            'currency' => $country[0],
            'amt_ext' => $country[1],
            'dollar' => $country[2],
        ];

        // Create a new exhibitor record
        $exhibitor = exhibitor_reg_details::create($exhibitorData);
        //generate random password of 8 characters

        //store exhibitor_id in session
        Session::put('exhibitor_id', $exhibitor->exhibitor_id);
        Session::put('tin_no', $exhibitor->tin_no);
        if (!session()->has('exhibitor_id')) {
            // Store exhibitor_id in the session
            session(['exhibitor_id' => $exhibitor->exhibitor_id]);
        }
        //verify whether it is put into session or not
        Log::info('Exhibitor ID' . session('exhibitor_id'));

        // Return to previewExhibitor with $exhibitor_id
        return redirect()->route('preview.exhibitor' );


        /*return response()->json([
            'message' => 'Exhibitor submitted successfully with login details',
            'exhibitor' => $exhibitor
        ], 201);*/
    }

    //preview exhibitor
    public function previewExhibitor()
    {
        if (session()->has('exhibitor_id')) {
            $exhibitor_id = request()->session()->get('exhibitor_id');

            // Log the exhibitor_id
            //Log::info('Exhibitor ID from session: ' . $exhibitor_id);

            // Use the exhibitor_id to find the exhibitor in the database
            $exhibitor = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();

            // Log the result of the database query
            //Log::info('Exhibitor from database: ', (array) $exhibitor);

            // Check if exhibitor exists
            if (!$exhibitor) {
                // Handle the case where the exhibitor is not found
                return redirect()->back()->with('error', 'Exhibitor not found');
            }

            return view('exhibitor.preview', compact('exhibitor'));
        } else {
            // Handle the case when exhibitor_id is not set in the session
            // You can redirect to an error page or display an error message
            return redirect()->route('exhibitor.create')->with('error', 'Exhibitor ID not found in the session.');
        }
    }
    //go to payment page
    public function paymentPage()
    {
        if (session()->has('exhibitor_id')) {
            $exhibitor_id = request()->session()->get('exhibitor_id');
            // Log the exhibitor_id
            //Log::info('Exhibitor ID from session: ' . $exhibitor_id);

            // Use the exhibitor_id to find the exhibitor in the database
            $exhibitor = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();

            $order_data = [
                'amount' => $exhibitor->total_amount,
                'currency' => $exhibitor->currency,
                'tin_no' => $exhibitor->tin_no,
                'customer_phone' => $exhibitor->cp_mobile,
                'customer_name' => $exhibitor->cp_fname . ' ' . $exhibitor->cp_lname,
                'customer_email' => $exhibitor->cp_email,
                'customer_address' => $exhibitor->address1,
                'customer_city' => $exhibitor->city,
                'customer_state' => $exhibitor->state,
                'customer_zip' => $exhibitor->zip_code,
                'customer_country' => $exhibitor->country,
            ];

            //store tin number in session
            Session::put('tin_no', $exhibitor->tin_no);
            if (!session()->has('tin_no')) {
                // Store exhibitor_id in the session
                session(['tin_no' => $exhibitor->tin_no]);
            }
            $cashfree = new CashfreePaymentController();
            $pay_id = $cashfree->paynow($order_data);
            Log::info('Payment ID: ' . $pay_id);

            // Check if exhibitor exists
            if (!$exhibitor) {
                // Handle the case where the exhibitor is not found
                return redirect()->back()->with('error', 'Exhibitor not found');
            }

            //return view of paynow page
            return view('payment.paynow', compact('pay_id', 'exhibitor'));
            return response()->json([
                'exhibitor' => $exhibitor
            ], 200);

            return view('exhibitor.payment', compact('exhibitor'));
        } else {
            // Handle the case when exhibitor_id is not set in the session
            // You can redirect to an error page or display an error message
            //return json
            return response()->json([
                'error' => 'Exhibitor ID not found in the session.'
            ], 404);
            return redirect()->route('error.page')->with('error', 'Exhibitor ID not found in the session.');
        }
    }

    //payment success route
    public function paymentSuccess()
    {
        if (session()->has('exhibitor_id')) {
            $exhibitor_id = request()->session()->get('exhibitor_id');
            // Log the exhibitor_id
            //Log::info('Exhibitor ID from session: ' . $exhibitor_id);

            // Use the exhibitor_id to find the exhibitor in the database
            $exhibitor = exhibitor_reg_details::where('exhibitor_id', $exhibitor_id)->first();

            //success payment create credentials for exhibitor portal

            $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
            //create login details for exhibitor in user_login_table
            $loginData = [
                'exhibitor_id' => $exhibitor_id,
                'email' => $exhibitor->cp_email,
                'password' => bcrypt($password),
                'password_actual'=> $password,
            ];
            user_login_details::create($loginData);

            // Check if exhibitor exists
            if (!$exhibitor) {
                // Handle the case where the exhibitor is not found
                return redirect()->back()->with('error', 'Exhibitor not found');
            }
            //destroy session
            Session::forget('exhibitor_id');
            return view('exhibitor.success', compact('exhibitor'));
        } else {
            // Handle the case when exhibitor_id is not set in the session
            // You can redirect to an error page or display an error message
            return redirect()->route('error.page')->with('error', 'Exhibitor ID not found in the session.');
        }
    }
    public function submit2(Request $request)
    {
        Log::info($request->all());
        Exhibitor::create($request->all());
    }

    //Cost Generation
    public function cost($booth_size)
    {
        $cost = 0;
        if ($booth_size == '6sqm') {
            $cost = 39999;
        } elseif ($booth_size == '9sqm') {
            $cost = 59999;
        } elseif ($booth_size == '9x9') {
            $cost = 30000;
        } elseif ($booth_size == '12x12') {
            $cost = 40000;
        }
        return $cost;
    }

    //exhibitor delegate count
    public function delegateCount($booth_size)
    {
        $del_count = 0;
        $stall_manning =0;

        if ($booth_size == '6sqm') {
            $del_count = 2;
            $stall_manning = 1;
        } elseif ($booth_size == '9sqm') {
            $del_count = 4;
            $stall_manning = 2;
        } elseif ($booth_size == '12sqm') {
            $del_count = 6;
            $stall_manning = 3;
        }
        return [$del_count, $stall_manning];
    }

    //Generate TIN Number
    public function generateTIN()
    {
        $tin = 'TIN' . rand(1000, 9999);
        return $tin;
    }

    //processing charge
    public function processingCharge($total): float
    {
        $processing_charge_per = 3;
        return (($total * $processing_charge_per) / 100);
    }

    //GST tax calculation
    public function tax($cost): float
    {
        $SERVICE_TAX = 18;
        $main_amt = $cost;
        return round(($main_amt * $SERVICE_TAX) / 100);
    }

    //payment currency
    public function currency($country)
    {
        $currency = '';
        $amt_ext = '';
        if ($country == 'INDIAN') {
            $currency = 'INR';
            $amt_ext = 'Rs.';
            $rate = 1;

        } elseif ($country == 'INTERNATIONAL'){
            $currency = 'USD';
            $amt_ext = '$';
            $rate = $this->currencyRate($country);
        }

        return [$currency, $amt_ext, $rate];
    }
    //fetch current usd Indian rate
    public function currencyRate($country)
    {
        $url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $response = file_get_contents($url);
        $result = json_decode($response, true);
        $rate = $result['rates']['INR'];
        $amt = 0;
        if ($country == 'INDIAN') {
            $amt = 1;
        } elseif ($country == 'INTERNATIONAL'){
            $amt = $rate;
        }
        return $rate;

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
