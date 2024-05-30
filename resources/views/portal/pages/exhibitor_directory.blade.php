<!-- portal/pages/exhibitor_directory.blade.php -->

@include('portal.components.header')
@include('portal.components.sidebar')
<script src="https://cdn.tailwindcss.com"></script>

@php
$exh_id = session('exhibitor_id');
@endphp

<main class="container mx-auto py-8 md:py-12 lg:py-16 px-4 md:px-6">
    @if ($directories)
    <!-- Exhibitor information -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center space-x-4">
            <img src="{{ Storage::url('logos/' . $directories->org_logo) }}" alt="Organization Logo" class="w-40 rounded-full">
            <div>
                <h2 class="text-2xl font-bold text-primary">{{ $directories->fascia_name }}</h2>
            </div>
        </div>
        <p class="text-gray-700 mt-4 text-justify">{{ $directories->org_profile }}</p>
    </div>

    @else
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Fill the Exhibitor Directory Information</h2>
        <form class="grid gap-4" method="POST" action={{route('post_ExhibitorDirectory')}} enctype="multipart/form-data">
            @csrf <!-- CSRF protection -->
            <input type="hidden" name="exhibitor_id" value="{{ $exh_id }}">
            <div class="grid gap-2">
                <label for="fascia_name" class="text-sm font-medium">Fascia Name</label>
                <input type="text" id="fascia_name" class="input-field border" style="height: 2.5rem;" placeholder="Enter Fascia Name" name="fascia_name">
            </div>
            <div class="grid gap-2">
                <label for="org_logo" class="text-sm font-medium">Org Logo</label>
                <input type="file" id="org_logo" class="input-field border" style="height: 2.5rem;" name="org_logo">
            </div>
            <div class="grid gap-2">
                <label for="profile" class="text-sm font-medium">Profile</label>
                <textarea id="profile" class="input-field border" rows="3" placeholder="Enter Organization Profile" style="height: 6rem;" name="profile"></textarea>
            </div>
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 justify-self-end" type="submit">Submit</button>
        </form>
    </div>

    @endif
</main>


<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            localStorage.setItem("mode", "dark");
        } else {
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if (sidebar.classList.contains("close")) {
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    });
</script>
