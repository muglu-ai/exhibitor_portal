@include('portal.components.header')
@include('portal.components.sidebar')
@php
$exh_id = session('exhibitor_id');
@endphp
<div class="dash-content">
    <div class="overview">
        <h1>Exhibitor Directory</h1>
        @if (!empty($directories))
            @foreach ($directories as $directory)
            <div class="exhibitor-card">
                <h2>{{ $directory['org_name'] }}</h2>
                <p><strong>Fascia Name:</strong> {{ $directory['fascia_name'] }}</p>
                <div class="org-logo">
                    <img src="{{ asset('logos/banner.png') }}" alt="{{ $directory['org_name'] }} Logo">
                </div>
                <p><strong>Organization Profile:</strong>
                   {{ $directory['org_profile'] }}
                </p>
            </div>
            @endforeach
        @else
            <p>No exhibitors found.</p>
        @endif

        @if (empty($directories))
        <div class="add-exhibitor-directory">
            <h2>Add Exhibitor Directory</h2>
            <form action="{{ route('postExhibitorDirectory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="exhibitor_id" value="{{$exh_id}}"> <!-- Replace with dynamic exhibitor ID as needed -->
                <div class="form-group">
                    <label for="org_name">Organization Name</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" required>
                </div>
                <div class="form-group">
                    <label for="fascia_name">Fascia Name</label>
                    <input type="text" class="form-control" id="fascia_name" name="fascia_name" required>
                </div>
                <div class="form-group">
                    <label for="org_logo">Organization Logo</label>
                    <input type="file" class="form-control" id="org_logo" name="org_logo" required>
                </div>
                <div class="form-group">
                    <label for="org_profile">Organization Profile</label>
                    <input type="file" class="form-control" id="org_profile" name="org_profile" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @endif
    </div>
</div>

<style>
    .exhibitor-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .exhibitor-card h2 {
        margin-top: 0;
    }

    .org-logo img {
        max-width: 200px;
        height: auto;
        margin-top: 10px;
    }

    .org-profile a {
        color: #007bff;
        text-decoration: none;
    }

    .org-profile a:hover {
        text-decoration: underline;
    }

    .add-exhibitor-directory {
        border: 1px solid #ddd;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
</style>
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
    })
</script>
