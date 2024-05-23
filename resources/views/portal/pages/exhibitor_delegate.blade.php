@include('portal.components.header')
@include('portal.components.sidebar')

<div class="dash-content">
    <div class="overview">
        <h1>Exhibitor Details</h1>

        @if ($exhibitordel)
            <table class="table table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Exhibitor ID</th>
                        <th>Sector</th>
                        <th>Org Type</th>
                        <th>Org Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contact Person Row -->
                    <tr class="contact-person">
                        <td>{{ $exhibitordel->exhibitor_id }}</td>
                        <td>{{ $exhibitordel->sector }}</td>
                        <td>{{ $exhibitordel->org_type }}</td>
                        <td>{{ $exhibitordel->organization_name }}</td>
                        <td>{{ $exhibitordel->cp_name }}</td>
                        <td>{{ $exhibitordel->cp_email }}</td>
                        <td>{{ $exhibitordel->cp_contact }}</td>
                    </tr>
                    <!-- Delegates Rows -->
                    @for ($i = 1; $i <= 6; $i++)
                        <tr class="delegate">
                            <td colspan="4"></td>
                            <td>{{ $exhibitordel->{'del' . $i . '_name'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_email'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_contact'} }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @else
            <div class="text-center mt-3">No exhibitor found</div>
        @endif
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

<style>
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #fff;
        border-collapse: collapse;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .thead-dark th {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }
    .text-center {
        text-align: center;
    }
    .mt-3 {
        margin-top: 1rem;
    }
    .contact-person {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .delegate {
        background-color: #e9ecef;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
</style>
