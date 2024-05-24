<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    @vite(['resources/css/portal.css'])
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Exhibitor Dashboard</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{asset('logos/banner.png')}}" alt="">
            </div>

            <span class="logo_name">Exhibitor Portal</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="{{ route('portal') }}">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li>
                    <a href="{{ route('get_one_exhibitor') }}">
                        <i class="uil uil-info-circle"></i> <!-- Info icon -->
                        <span class="link-name">Exhibitor Info</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('get_StallManning') }}">
                        <i class="uil uil-store"></i> <!-- Business chart icon -->
                        <span class="link-name">Stall Manning</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('get_ExhibitorDelegate') }}">
                        <i class="uil uil-user-check"></i> <!-- User check icon -->
                        <span class="link-name">Exhibitor Delegates</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('get_ExhibitorDirectory') }}">
                        <i class="uil uil-book-open"></i> <!-- Address book icon -->
                        <span class="link-name">Exhibitor Directory</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="uil uil-book"></i> <!-- Book icon -->
                        <span class="link-name">Exhibitor Manual</span>
                    </a>
                </li>

            </ul>

            <ul class="logout-mode">
                <!-- <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li> -->

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
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
