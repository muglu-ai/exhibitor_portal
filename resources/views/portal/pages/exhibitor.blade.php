@include('portal.components.header')
@include('portal.components.sidebar')

<div class="dash-content">
    <div class="overview">
        <h1>Exhibitor Details</h1>
        <!-- <pre>{{ json_encode($exhibitor, JSON_PRETTY_PRINT) }}</pre> -->
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Exhibitor ID</th>
                    <th>Org Name</th>
                    <th>Org Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @if ($exhibitor)
                    <tr>
                        <td>{{ $exhibitor->exhibitor_id }}</td>
                        <td>{{ $exhibitor->org_name }}</td>
                        <td>{{ $exhibitor->org_type }}</td>
                        <td>{{ $exhibitor->cp_name }}</td>
                        <td>{{ $exhibitor->cp_email }}</td>
                        <td>{{ $exhibitor->cp_mobile }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="6" class="text-center">No exhibitor found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle"),
        sidebar = body.querySelector("nav"),
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
