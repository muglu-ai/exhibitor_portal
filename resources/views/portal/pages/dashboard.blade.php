@include('portal.components.header')
@include('portal.components.sidebar')
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>
        @if($exhibitordetail)
        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-thumbs-up"></i>
                <span class="text">Exhibitor Delegates</span>
                <span class="number">{{ $exhibitordetail->delegate_alloted }}</span>
            </div>
            <div class="box box2">
                <i class="uil uil-comments"></i>
                <span class="text">Stall Manning</span>
                <span class="number">{{ $exhibitordetail->sm_count }}</span>
            </div>
            <div class="box box3">
                <i class="uil uil-share"></i>
                <span class="text">Service Badges</span>
                <span class="number">{{ $exhibitordetail->service_badge }}</span>
            </div>
        </div>
        @endif
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const body = document.querySelector("body"),
            modeToggle = document.querySelector(".mode-toggle"),
            sidebar = document.querySelector("nav"),
            sidebarToggle = document.querySelector(".sidebar-toggle");

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
            localStorage.setItem("mode", body.classList.contains("dark") ? "dark" : "light");
        });

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            localStorage.setItem("status", sidebar.classList.contains("close") ? "close" : "open");
        });
    });
</script>
