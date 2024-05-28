@include('portal.components.header')
@include('portal.components.sidebar')

@php
$exh_id = session('exhibitor_id');
@endphp

<div class="dash-content">
    <div class="overview">
        <h1>Exhibitor Details</h1>

        @if ($exhibitordel)
        <div class="exhibitor-details">
            <p><strong>Exhibitor ID:</strong> {{ $exhibitordel->exhibitor_id }}</p>
            <p><strong>Org Type:</strong> {{ $exhibitordel->org_type }}</p>
            <p><strong>Org Name:</strong> {{ $exhibitordel->org_name }}</p>
            <p><strong>Sector:</strong> {{ $exhibitordel->sector }}</p>
            <p><strong>Name:</strong> {{ $exhibitordel->cp_name }}</p>
            <p><strong>Email:</strong> {{ $exhibitordel->cp_email }}</p>
            <p><strong>Phone:</strong> {{ $exhibitordel->cp_mobile }}</p>
        </div>
        @endif

        @if ($exhibitoradd1)
        <div class="additional-contact-person">
            <p><strong>Org Type:</strong> {{ $exhibitoradd1->org_type }}</p>
            <p><strong>Org Name:</strong> {{ $exhibitoradd1->org_name }}</p>
            <p><strong>Sector:</strong> {{ $exhibitoradd1->sector }}</p>
            <p><strong>Name:</strong> {{ $exhibitoradd1->cp_title }} {{ $exhibitoradd1->cp_fname }} {{ $exhibitoradd1->cp_lname }}</p>
            <p><strong>Email:</strong> {{ $exhibitoradd1->cp_email }}</p>
            <p><strong>Phone:</strong> {{ $exhibitoradd1->cp_mobile }}</p>
        </div>
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
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <tr class="delegate">
                <td>{{ $exhibitoradd2->del_title }} {{ $exhibitoradd2->del_fname }} {{ $exhibitoradd2->del_lname }}</td>
                <td>{{ $exhibitoradd2->del_email }}</td>
                <td>{{ $exhibitoradd2->del_contact }}</td>
                <td>{{ $exhibitoradd2->del_designation }}</td>
                <td>{{ $exhibitoradd2->del_govtid_type }}</td>
                <td>{{ $exhibitoradd2->del_govtid_no }}</td>
                <td>{{ $exhibitoradd2->del_org_category }}</td>
            </tr>
        </tbody>
    </table>
</div>


<div id="delegateFormContainer" style="display: none; margin-top: 20px;">
    <form action="{{ route('post_ExhibitorDelegate') }}" method="POST" id="delegateForm">
        @csrf
        <input type="hidden" name="exhibitor_id" value="{{ $exhibitordel ? $exhibitordel->exhibitor_id : $exh_id }}">
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
        })
    </script>
