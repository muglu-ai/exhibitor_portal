@include('portal.components.header')
@include('portal.components.sidebar')

<div class="dash-content">
    <div class="overview">
        <h1>Stall Manning Details</h1>

        @if ($exhibitorsm)
            <div class="org-details">
                <h4>Organization Name: {{ $exhibitorsm->org_name }}</h4>
            </div>
            <table class="table table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>SM Name</th>
                        <th>SM Email</th>
                        <th>SM Designation</th>
                        <th>SM Phone</th>
                        <th>SM Govt ID Type</th>
                        <th>SM Govt ID Number</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 5; $i++)
                        <tr>
                            <td>{{ $exhibitorsm->{'sm' . $i . '_name'} }}</td>
                            <td>{{ $exhibitorsm->{'sm' . $i . '_email'} }}</td>
                            <td>{{ $exhibitorsm->{'sm' . $i . '_designation'} }}</td>
                            <td>{{ $exhibitorsm->{'sm' . $i . '_mobile'} }}</td>
                            <td>{{ $exhibitorsm->{'sm' . $i . '_govt_id_type'} }}</td>
                            <td>{{ $exhibitorsm->{'sm' . $i . '_govt_id_number'} }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @else
            <tr>
                <td colspan="3" class="text-center">No exhibitor found</td>
            </tr>
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
