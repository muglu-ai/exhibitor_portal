@include('layouts.formheader')
@include('layouts.form_navbar')
<style>
    .error-message {
        color: red;
        display: none;
        font-size: 0.875em;
        margin-top: 0.5em;
    }
    /*input:invalid {*/
    /*    border: 2px dashed red;*/
    /*}*/

    /*input:invalid:required {*/
    /*    background-image: linear-gradient(to right, pink, lightgreen);*/
    /*}*/

    input:valid {
        border: 2px solid black;
    }
</style>

<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8" style="
    padding-top: 20px; padding-bottom: 1px;">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">

        </div>

    </div>
    <!-- Table which contains the tariff Exhibition Tariff – StartUp Innovation Zone
OPTION	BOOTH SIZE(SQM)	TOTAL COST IN INR
1	6	39,999
2	9	59,999 -->
    <div class="container mx-auto max-w-screen-lg">
        <div class="mt-8 p-8 bg-white border border-gray-300 rounded-lg">
    <div class="max-w-3xl mx-auto">
        <section class="w-full max-w-4xl mx-auto py-12 md:py-16">
            <div class="flex flex-col gap-6">
                <div class="text-center space-y-2">
                    <h2 class="text-3xl font-bold tracking-tight text-indigo-600 dark:text-indigo-400">
                        Exhibition Tariff - StartUp Innovation Zone
                    </h2>
                    <p class="text-gray-500 font-medium">
                        Choose the tariff option that best suits your needs.
                    </p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-left">
                        <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-4 py-3 font-medium">OPTION</th>
                            <th class="px-4 py-3 font-medium">BOOTH SIZE (SQM)</th>
                            <th class="px-4 py-3 font-medium">TOTAL COST IN INR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-100">
                            <td class="px-4 py-3 font-medium text-indigo-600 dark:text-indigo-400 text-center">1</td>
                            <td class="px-4 py-3 text-center">6</td>
                            <td class="px-4 py-3 text-center">39,999</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-100">
                            <td class="px-4 py-3 font-medium text-indigo-600 dark:text-indigo-400 text-center">2</td>
                            <td class="px-4 py-3 text-center">9</td>
                            <td class="px-4 py-3 text-center">59,999</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>



    <form id="form" action="{{ route('exhibitor.submit') }}" method="POST" class="mx-auto mt-5 max-w-xl sm:mt-8" enctype="multipart/form-data">
         @csrf
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Validation Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--Select booth size radio button either 6sqm or 9sqm -->
        <div class="sm:col-span-2">

            <label for="booth_size" id="booth_size_label" class="block text-sm font-semibold leading-6 text-gray-900">Select Booth Size</label>
            <p id="booth_size_error" class="error-message">Please select one of the options.</p>
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="mt-2.5 flex justify-between">
    <div class="flex items-center">
        <input type="radio" name="booth_size" id="booth_size_6sqm" value="6sqm" class="block text-sm font-medium leading-6 text-gray-900">
        <label for="booth_size_6sqm" class="block text-sm font-semibold leading-6 text-gray-900 ml-2">6sqm</label>
    </div>
    <div class="flex items-center">
        <input type="radio" name="booth_size" id="booth_size_9sqm" value="9sqm" class="block text-sm font-medium leading-6 text-gray-900">
        <label for="booth_size_9sqm" class="block text-sm font-semibold leading-6 text-gray-900 ml-2">9sqm</label>
    </div>
            </div>

    </div>
        </div>

        <!-- dropdown of sector  to select one of the sector -->
        <div class="sm:col-span-2 mt-5">
            <label for="sector" id="sector_label" class="block text-sm font-semibold leading-6 text-gray-900">Select Sector</label>
            <p id="sector_error" class="error-message">Please select one of the Sector.</p>
            <div class="mt-2.5">
                <select name="sector" id="sector" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="">Select Sector</option>
                    @foreach ($sectors as $sector)
                        <option value="{{ $sector }}">{{ $sector }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="sm:col-span-2 mt-5">
            <label for="exhibitor_name" class="block text-sm font-semibold leading-6 text-gray-900">Name of the Exhibitor (Organisation Name)</label>
            <div class="mt-2.5">
              <input type="text" name="exhibitor_name" id="exhibitor_name" autocomplete="exhibitor_name" required value="{{ old('exhibitor_name') }}" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your Organisation name" >
            </div>
        </div>
        <!-- Upload of Company Registration Certificate / Certificate of Incorporation -->
        <div class="sm:col-span-2 mt-5">
            <label for="company_reg" class="block text-sm font-semibold leading-6 text-gray-900">Upload Company Registration Certificate / Certificate of Incorporation</label>
            <div class="mt-2.5">
                <input type="file" accept="application/pdf" name="company_reg" id="company_reg" autocomplete="company_reg" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{old('company_reg')}}" required >
            </div>
            <!-- Note:
            1. File should be in PDF format
            2. File size should not exceed 2MB -->
            <p class="text-sm text-gray-600 mt-2">Note: File should be in PDF format and size should not exceed 2MB</p>

        </div>

        <!-- Invoice Address -->
        <div class="sm:col-span-2 mt-5">
            <label for="invoice_add" class="block text-sm font-semibold leading-6 text-gray-900">Invoice Address</label>
            <div class="mt-2.5">
                <input type="text" name="invoice_add" value="{{old('invoice_add')}}" id="invoice_add" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>  </input>
            </div>
        </div>
        <!-- Organisation Address -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mt-5">
            <div>
                <label for="city" class="block text-sm font-semibold leading-6 text-gray-900">City</label>
                <div class="mt-2.5">
                    <input type="text" name="city" value="{{old('city')}}" id="city" placeholder="City" autocomplete="city" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="state" class="block text-sm font-semibold leading-6 text-gray-900">State</label>
                <div class="mt-2.5">
                    <input type="text" name="state" id="state" value="{{old('state')}}" placeholder="State" autocomplete="state" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="country" class="block text-sm font-semibold leading-6 text-gray-900">Country</label>
                <div class="mt-2.5">
                    <select id="country" name="country" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="India">India</option>

                        @foreach ($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div>
                <label for="zip" class="block text-sm font-semibold leading-6 text-gray-900">Zip Code</label>

                <div class="mt-2.5">
                    <input type="text" name="zip" id="zip" value="{{old('zip')}}" placeholder="Zip Code" autocomplete="zip" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>

        <!-- Contact Number with select of country dial code then number -->
        <div class="sm:col-span-2 mt-5">
            <label for="con_number" class="block text-sm font-semibold leading-6 text-gray-900">Contact Number</label>
            <div class="relative mt-2.5">
                <p id="con_number_error" class="error-message">Please enter 10 digit Contact Number.</p>
                <div class="absolute inset-y-0 left-0 flex items-center">

                    <label for="country" class="sr-only">Country</label>

                    <select id="country" name="country" class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        <option>IN</option>
                        <option>CA</option>
                        <option>EU</option>
                        <option>US</option>
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="tel" name="con_number" id="con_number" autocomplete="tel" required class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <!-- GST Registered or not dropdown if registered then enter GST number -->
        <div class="sm:col-span-2 mt-5">
            <label for="gst_reg" class="block text-sm font-semibold leading-6 text-gray-900">GST Registered</label>
            <div class="mt-2.5">
                <select name="gst_reg" id="gst_reg" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <div id="gst_number_div" style="display: none;" class="sm:col-span-2 mt-5">
                    <label for="gst_number" class="block text-sm font-semibold leading-6 text-gray-900">GST Number</label>
                    <p id="gst_number_error" class="error-message">Please Enter GST Number.</p>
                    <div class="mt-2.5">
                        <input type="text" name="gst_number" id="gst_number" autocomplete="gst_number" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>
        <!-- PAN Number -->
        <div class="sm:col-span-2 mt-5">
            <label for="pan_number" class="block text-sm font-semibold leading-6 text-gray-900">PAN Number</label>
            <div class="mt-2.5">
                <input type="text" name="pan_number" id="pan_number" autocomplete="pan_number" required value="{{old('pan_number')}}" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3 mt-5">
            <div>
                <label for="cp_title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
                <div class="mt-2.5">
                    <select
                        name="cp_title"
                        id="cp_title"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Dr">Dr</option>
                        <option value="Ms">Ms</option>
                        <option value="Prof">Prof</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First name</label>
                <div class="mt-2.5">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{old('first_name')}}" required autocomplete="first_name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="last_name" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>
                <div class="mt-2.5">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{old('last_name')}}" autocomplete="last_name" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="sm:col-span-2 mt-5">
            <label for="cp_design" class="block text-sm font-semibold leading-6 text-gray-900">Contact Person Designation *</label>
            <div class="mt-2.5">
                <input type="text" name="cp_design" id="cp_design" autocomplete="cp_design" value="{{old('cp_design')}}" placeholder="Contact Person Designation" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <!-- Contact Person Email -->
        <div class="sm:col-span-2 mt-5">
            <label for="cp_email" class="block text-sm font-semibold leading-6 text-gray-900">Contact Person Email *</label>
            <div class="mt-2.5">
                <input type="email" name="cp_email" id="cp_email" autocomplete="cp_email" value="{{old('cp_email')}}" placeholder="Contact Person Email" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <!-- Contact Person Contact Number -->
        <div class="sm:col-span-2 mt-5">
            <label for="cp_con_number" class="block text-sm font-semibold leading-6 text-gray-900">Contact Person Contact Number *</label>
            <div class="relative mt-2.5">
                <div class="absolute inset-y-0 left-0 flex items-center">
                    <label for="country" class="sr-only">Country</label>
                    <p id="cp_con_number_error" class="error-message">Please Enter 10 digits Mobile Number.</p>
                    <select id="country" name="country" class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        <option>IN</option>
                        <option>CA</option>
                        <option>EU</option>
                        <option>US</option>
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="tel" name="cp_con_number" id="cp_con_number" autocomplete="tel" value="{{old('cp_con_number')}}" required placeholder="Contact Person Contact Number" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <!-- Website -->
        <div class="sm:col-span-2 mt-5">
            <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">Website</label>
            <div class="mt-2.5">
                <input type="text" name="website" id="website" autocomplete="website" placeholder="Website" required value="{{old('website')}}" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <!-- Payment Mode Radio button as CCAvenue
        CCAvenue Payment - Credit Card / Debit Card / Net Banking / Google Pay / PhonePe / Paytm
Please Note: 3% processing charges is applicable for CCAVenue payment mode
-->
        <div class="sm:col-span-2 mt-5">
            <label for="payment_mode" class="block text-sm font-semibold leading-6 text-gray-900">Payment Mode</label>
            <div class="mt-2.5">
                <div class="flex items
                ">
                    <input type="radio" name="payment_mode" id="payment_mode" checked value="CCAvenue" class="block text-sm font-medium leading-6 text-gray-900">
                    &nbsp;&nbsp;
                    <label for="payment_mode" class="block text-sm font-semibold leading-6 text-gray-900" >CCAvenue Payment - Credit Card / Debit Card / Net Banking / UPI</label>
                </div>
                <p class="text-sm text-gray-600 mt-2">Please Note: 3% processing charges is applicable for CCAVenue payment mode</p>
            </div>
        </div>

        <!-- Captcha -->
        <div class="sm:col-span-2 mt-5">
            <label for="captcha" class="block text-sm font-semibold leading-6 text-gray-900">Captcha</label>
            <div class="mt-2.5 flex">
                <div class="w-1/2">
                    <input type="text" name="captcha" id="captcha" autocomplete="captcha" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                &nbsp;&nbsp;
                <div class="w-1/2">
                    <img src="{{ captcha_src('default') }}" alt="captcha">
                </div>


            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
        </div>
    </form>
</div>
    </div>
</div>


<script>


    document.getElementById('gst_reg').addEventListener('change', function() {
        if (this.value === 'yes') {
            document.getElementById('gst_number_div').style.display = 'block';
        } else {
            document.getElementById('gst_number_div').style.display = 'none';
        }
    });

        document.getElementById('form').addEventListener('submit', function(event) {
            var radios = document.getElementsByName('booth_size');
            var isChecked = false;

            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                event.preventDefault();
                //scroll to the id of error message
                var errorMessage = document.getElementById('booth_size_error');
                errorMessage.style.display = 'block';
                errorMessage.scrollIntoView({ behavior: 'smooth' });
            } else {
                document.getElementById('error-message').style.display = 'none';
            }

            //check for sector validation
            var sector = document.getElementById('sector');
            if (sector.value === '') {
                event.preventDefault();
                var errorMessage2 = document.getElementById('sector_error')
                errorMessage2.style.display = 'block';
                errorMessage2.scrollIntoView({ behavior: 'smooth' });
            } else {
                document.getElementById('sector_error').style.display = 'none';
            }

            //check validation for gst number
            var gstReg = document.getElementById('gst_reg');
            if (gstReg.value === 'yes') {
                var gstNumber = document.getElementById('gst_number');
                if (gstNumber.value === '') {
                    event.preventDefault();
                    var errorMessage3 = document.getElementById('gst_number_error');
                    errorMessage3.style.display = 'block';
                    errorMessage3.scrollIntoView({ behavior: 'smooth' });
                } else {
                    document.getElementById('gst_number_error').style.display = 'none';
                }
            }
            //contact number should of 10 digits
            var conNumber = document.getElementById('con_number');
            if (conNumber.value.length !== 10) {
                event.preventDefault();
                var errorMessage4 = document.getElementById('con_number_error');
                errorMessage4.style.display = 'block';
                errorMessage4.scrollIntoView({ behavior: 'smooth' });
            } else {
                document.getElementById('con_number_error').style.display = 'none';
            }

            //pan number validation
            var panNumber = document.getElementById('pan_number');
            if (panNumber.value === '') {
                event.preventDefault();
                var errorMessage5 = document.getElementById('pan_number_error');
                errorMessage5.style.display = 'block';
                errorMessage5.scrollIntoView({ behavior: 'smooth' });
            } else {
                document.getElementById('pan_number_error').style.display = 'none';
            }

            //contact person contact number validation
            var cpConNumber = document.getElementById('cp_con_number');
            if (cpConNumber.value.length !== 10) {
                event.preventDefault();
                var errorMessage6 = document.getElementById('cp_con_number_error');
                errorMessage6.style.display = 'block';
                errorMessage6.scrollIntoView({ behavior: 'smooth' });
            } else {
                document.getElementById('cp_con_number_error').style.display = 'none';
            }








    });






</script>
