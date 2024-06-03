@include('portal.components.header')
@include('portal.components.sidebar')
<script src="https://cdn.tailwindcss.com"></script>
@php
$exh_id = session('exhibitor_id');
@endphp
<div class="dash-content"></div>

<main class="w-full max-w-6xl mx-auto px-4 md:px-6 py-8 md:py-12">
    @if ($exhibitor)
    @if ($missingFields)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
        <form action="{{ route('exhibitor.update', $exh_id) }}" method="POST" class="space-y-6 w-full">
            @csrf
            @method('PATCH')
            <div>
                <h3 class="text-sm font-medium mb-1">Booth Information</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">Booth Area: {{ $exhibitor->booth_area }}</p>
                    <p class="text-sm text-gray-100 dark:text-gray-50">Booth Space: {{ $exhibitor->booth_space }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Contact Person Email</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->cp_email }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Organization Name</h3>
                <input type="text" name="org_name" value="{{ old('org_name', $exhibitor->org_name) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium mb-1">Organization Type</h3>
                    <input type="text" name="org_type" value="{{ old('org_type', $exhibitor->org_type) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
                </div>
                <div>
                    <h3 class="text-sm font-medium mb-1">Sector</h3>
                    <input type="text" name="sector" value="{{ old('sector', $exhibitor->sector) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Address</h3>
                <input type="text" name="address1" value="{{ old('address1', $exhibitor->address1) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
                <input type="text" name="address2" value="{{ old('address2', $exhibitor->address2) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2">
                <input type="text" name="city" value="{{ old('city', $exhibitor->city) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
                <input type="text" name="state" value="{{ old('state', $exhibitor->state) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
                <input type="text" name="country" value="{{ old('country', $exhibitor->country) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
                <input type="text" name="zip_code" value="{{ old('zip_code', $exhibitor->zip_code) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Contact Person</h3>
                <input type="text" name="cp_title" value="{{ old('cp_title', $exhibitor->cp_title) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
                <input type="text" name="cp_fname" value="{{ old('cp_fname', $exhibitor->cp_fname) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
                <input type="text" name="cp_lname" value="{{ old('cp_lname', $exhibitor->cp_lname) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
                <input type="text" name="cp_designation" value="{{ old('cp_designation', $exhibitor->cp_designation) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
                <input type="email" name="cp_email" value="{{ old('cp_email', $exhibitor->cp_email) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required disabled>
                <input type="text" name="cp_mobile" value="{{ old('cp_mobile', $exhibitor->cp_mobile) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Website</h3>
                <input type="url" name="website" value="{{ old('website', $exhibitor->website) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">GST Information</h3>
                <input type="text" name="gst_number" value="{{ old('gst_number', $exhibitor->gst_number) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
                <input type="text" name="pan_number" value="{{ old('pan_number', $exhibitor->pan_number) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full mt-2" required>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Sales Executive</h3>
                <input type="text" name="sales_executive" value="{{ old('sales_executive', $exhibitor->sales_executive) }}" class="bg-gray-100 dark:bg-gray-800 rounded-md p-4 w-full" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Information
                </button>
            </div>
        </form>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-medium mb-1">Organization Name</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->org_name }}</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium mb-1">Organization Type</h3>
                    <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                        <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->org_type }}</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-medium mb-1">Sector</h3>
                    <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                        <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->sector }}</p>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Address</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->address1 }}, {{ $exhibitor->address2 }}</p>
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->city }}, {{ $exhibitor->state }}, {{ $exhibitor->country }}, {{ $exhibitor->zip_code }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Contact Person</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->cp_title }} {{ $exhibitor->cp_fname }} {{ $exhibitor->cp_lname }}, {{ $exhibitor->cp_designation }}</p>
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->cp_email }}</p>
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->cp_mobile }}</p>
                </div>
            </div>
        </div>
        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-medium mb-1">Booth Information</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->booth_area }}, {{ $exhibitor->booth_space }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Website</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <a href="{{ $exhibitor->website }}" class="text-sm text-blue-400 hover:underline" target="_blank" rel="noopener">
                        {{ $exhibitor->website }}
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">GST Information</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">GST No: {{ $exhibitor->gst_number }}</p>
                    <p class="text-sm text-gray-100 dark:text-gray-50">PAN No: {{ $exhibitor->pan_number }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-sm font-medium mb-1">Sales Executive</h3>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-md p-4">
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->sales_executive }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    @else
    <p class="text-center text-gray-100 dark:text-gray-50">No exhibitor found.</p>
    @endif
</main>

<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle"),
        sidebar = body.querySelector("nav"),
        sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if(getMode && getMode ==="dark"){
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if(getStatus && getStatus ==="close"){
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () =>{
        body.classList.toggle("dark");
        if(body.classList.contains("dark")){
            localStorage.setItem("mode", "dark");
        }else{
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if(sidebar.classList.contains("close")){
            localStorage.setItem("status", "close");
        }else{
            localStorage.setItem("status", "open");
        }
    });
</script>
