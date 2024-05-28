@include('portal.components.header')
@include('portal.components.sidebar')
<script src="https://cdn.tailwindcss.com"></script>
@php
$exh_id = session('exhibitor_id');
@endphp
<div class="dash-content">
</div>

<main class="w-full max-w-6xl mx-auto px-4 md:px-6 py-8 md:py-12">
    @if ($exhibitor)
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
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->country }}, {{ $exhibitor->zip_code }}</p>
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
                    <p class="text-sm text-gray-100 dark:text-gray-50">{{ $exhibitor->sales_executive }}
                </div>
            </div>
        </div>
    </div>
    @else
    <p class="text-center text-gray-100 dark:text-gray-50">No exhibitor found.</p>
    @endif
</main>

<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
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
