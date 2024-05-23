@include('portal.components.header')
@include('portal.components.sidebar')
@php
$total_delegates_allotted = 2; // Example value, change this accordingly
$delegateCount = 0; // Define delegate count variable
@endphp
<div class="dash-content">
    <div class="overview">
        <h1>Exhibitor Details</h1>

        @if ($exhibitordel)
        <div class="exhibitor-details">
            <p><strong>Exhibitor ID:</strong> {{ $exhibitordel->exhibitor_id }}</p>
            @if ($exhibitoradd)
            <p><strong>Org Type:</strong> {{ $exhibitoradd->org_type }}</p>
            <p><strong>Org Name:</strong> {{ $exhibitoradd->org_name }}</p>
            <p><strong>Sector:</strong> {{ $exhibitoradd->sector }}</p>
            <p><strong>Name:</strong> {{ $exhibitoradd->cp_name }}</p>
            <p><strong>Email:</strong> {{ $exhibitoradd->cp_email }}</p>
            <p><strong>Phone:</strong> {{ $exhibitoradd->cp_mobile }}</p>
            @endif
        </div>

        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Govt ID Type</th>
                    <th>Govt ID Number</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $delegateCount = 0;
                @endphp
                @for ($i = 1; $i <= $total_delegates_allotted; $i++)
                    @if (!empty($exhibitordel->{'del' . $i . '_name'}))
                        @php
                            $delegateCount++;
                        @endphp
                        <tr class="delegate">
                            <td>{{ $exhibitordel->{'del' . $i . '_name'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_email'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_contact'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_designation'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_govtid_type'} }}</td>
                            <td>{{ $exhibitordel->{'del' . $i . '_govtid_no'} }}</td>
                        </tr>
                    @endif
                @endfor
            </tbody>
        </table>
        @endif
    </div>
</div>

@if ($delegateCount < $total_delegates_allotted)
<button class="btn btn-primary" id="addDelegateButton">
    <i class="fas fa-plus"></i> Add Delegate
</button>
@endif

<div id="delegateFormContainer" style="display: none; margin-top: 20px;">
    <form action="{{ route('post_ExhibitorDelegate') }}" method="POST" id="delegateForm">
        @csrf
        <input type="hidden" name="exhibitor_id" value="{{ $exhibitordel ? $exhibitordel->exhibitor_id : 'EXH1234' }}">
        <div class="delegateEntry">
            <h5>Delegate Person</h5>
            <div class="form-group">
                <label for="del_name">Delegate Name</label>
                <input type="text" class="form-control" id="del_name" name="del_name" required>
            </div>
            <div class="form-group">
                <label for="del_email">Delegate Email</label>
                <input type="email" class="form-control" id="del_email" name="del_email" required>
            </div>
            <div class="form-group">
                <label for="del_contact">Delegate Phone</label>
                <input type="text" class="form-control" id="del_contact" name="del_contact" required>
            </div>
            <div class="form-group">
                <label for="del_designation">Delegate Designation</label>
                <input type="text" class="form-control" id="del_designation" name="del_designation" required>
            </div>
            <div class="form-group">
                <label for="del_govtid_type">Govt ID Type</label>
                <input type="text" class="form-control" id="del_govtid_type" name="del_govtid_type" required>
            </div>
            <div class="form-group">
                <label for="del_govtid_no">Govt ID Number</label>
                <input type="text" class="form-control" id="del_govtid_no" name="del_govtid_no" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="saveDelegateButton">Save changes</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addDelegateButton');
        const formContainer = document.getElementById('delegateFormContainer');

        addButton.addEventListener('click', function() {
            formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        });
    });

    // Remaining JavaScript for theme toggling
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

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }
</style>
