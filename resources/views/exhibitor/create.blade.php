@include('layouts.formheader')  
@include('layouts.form_navbar')

<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8" style="
    padding-top: 20px;">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">

        </div>

    </div>
    
    <form action="{{ route('exhibitor.submit') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" style="
        margin-top: 20px;">
         @csrf
         
        <div class="sm:col-span-2">
            <label for="exhibitor_name" class="block text-sm font-semibold leading-6 text-gray-900">Name of the Exhibitor</label>
            <div class="mt-2.5">
              <input type="text" name="exhibitor_name" id="exhibitor_name" autocomplete="exhibitor_name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your Organisation name">
            </div>
        </div>
        <br>

            <div class="sm:col-span-2">
                <label for="fas_name" class="block text-sm font-semibold leading-6 text-gray-900">Name for Fascia *</label>
                <div class="mt-2.5">
                    <input type="text" name="fas_name" id="fas_name" autocomplete="fas_name" placeholder="Fascia Name (written on Stall)" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        <br>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-3">
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
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" autocomplete="first_name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="last_name" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>
                <div class="mt-2.5">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="sm:col-span-2">
            <label for="cp_design" class="block text-sm font-semibold leading-6 text-gray-900">Contact Person Designation *</label>
            <div class="mt-2.5">
                <input type="text" name="cp_design" id="cp_design" autocomplete="cp_design" placeholder="Contact Person Designation" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <br> --}}
        <div class="sm:col-span-2">
            <label for="cp_design" class="block text-sm font-semibold leading-6 text-gray-900">Contact Person Designation *</label>
            <div class="mt-2.5">
                <input type="text" name="cp_design" id="cp_design" autocomplete="cp_design" placeholder="Contact Person Designation" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <br>
        <div class="sm:col-span-2">
            <label for="org_add" class="block text-sm font-semibold leading-6 text-gray-900">Organisation Address</label>
            <div class="mt-2.5">
                <textarea name="org_add" id="org_add" rows="4" placeholder="Organisation Address" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>
        <br>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
                <label for="city" class="block text-sm font-semibold leading-6 text-gray-900">City</label>
                <div class="mt-2.5">
                    <input type="text" name="city" id="city" placeholder="City" autocomplete="city" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="state" class="block text-sm font-semibold leading-6 text-gray-900">State</label>
                <div class="mt-2.5">
                    <input type="text" name="state" id="state" placeholder="State" autocomplete="state" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="country" class="block text-sm font-semibold leading-6 text-gray-900">Country</label>
                <div class="mt-2.5">
                    <select id="country" name="country" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Select Country</option>
                        
                        @foreach ($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>


                </div>
            </div>

            <div>
                <label for="zip" class="block text-sm font-semibold leading-6 text-gray-900">Zip Code</label>
                <div class="mt-2.5">
                    <input type="text" name="zip" id="zip" placeholder="Zip Code" autocomplete="zip" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
        </div>
        </div>
        <br>

        <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                <div class="mt-2.5">
                    <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        <br>
        <div class="sm:col-span-2">
                <label for="con_number" class="block text-sm font-semibold leading-6 text-gray-900">Contact number</label>
                <div class="relative mt-2.5">
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
                    <input type="tel" name="con_number" id="con_number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        <br>
        <div class="sm:col-span-2">
                <label for="profile" class="block text-sm font-semibold leading-6 text-gray-900">Profile</label>
                <div class="mt-2.5">
                    <textarea name="profile" id="profile" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
        <br>
          {{-- @csrf --}}
    {{-- <img src="{{ captcha_src('default') }}" alt="captcha">
    <input type="text" name="captcha"> --}}
    <br>
            <div class="flex gap-x-4 sm:col-span-2">
                <div class="flex h-6 items-center">
                    <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                    {{-- <button type="button" class="bg-indigo-600 flex w-8 flex-none cursor-pointer rounded-full p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                        <span class="sr-only">Agree to policies</span>
                        <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
                        <span aria-hidden="true" class="translate-x-3.5 h-4 w-4 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
                    </button> --}}
                </div>

                <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
                    By selecting this, you agree to our
                    <a href="#" class="font-semibold text-indigo-600">privacy&nbsp;policy</a>.
                </label>
            </div>
        <div class="mt-10">
            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
        </div>
    </form>
</div>
