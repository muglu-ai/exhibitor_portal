@include('portal.components.header')
@include('portal.components.sidebar')
<script src="https://cdn.tailwindcss.com"></script>
@php
$exh_id = session('exhibitor_id');
$total_sm_assigned = 5; // Hardcoded for now, to be fetched from the database
$max_sm_allowed = 5;
@endphp

<div class="dash-content px-4 md:px-6 py-8 md:py-12">
    <div class="overview bg-slate-500 dark:bg-slate-700 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-50 dark:text-gray-50 mb-4">Stall Manning Details</h1>

        @if ($total_sm_assigned < $max_sm_allowed)
        <button class="btn btn-primary mb-4 bg-slate-500 text-white hover:bg-slate-700" id="toggleFormButton">
            <i class="fas fa-plus"></i> Add Stall Manning
        </button>
        @endif

        @if ($exhibitorsm)
        <div class="org-details mb-4">
            <h4 class="font-bold text-gray-50 dark:text-gray-50">Organization Name: {{ $exhibitorsm->org_name }}</h4>
        </div>
        <table class="table-auto w-full border-collapse border border-blue-200 dark:border-blue-700">
            <thead class="bg-slate-600 dark:bg-slate-800 text-gray-50 dark:text-gray-50">
                <tr>
                    <th class="border py-2 text-center">SM Name</th>
                    <th class="border py-2 text-center">SM Email</th>
                    <th class="border py-2 text-center">SM Designation</th>
                    <th class="border py-2 text-center">SM Phone</th>
                    <th class="border py-2 text-center">SM Govt ID Type</th>
                    <th class="border py-2 text-center">SM Govt ID Number</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $total_sm_assigned; $i++)
                    @if ($exhibitorsm->{'sm' . $i . '_fname'})
                    <tr class="bg-slate-500 dark:bg-slate-700 text-gray-50 dark:text-gray-50">
                        <td class="border py-2 text-center">{{ $exhibitorsm->{'sm' . $i . '_title'} }} {{ $exhibitorsm->{'sm' . $i . '_fname'} }} {{ $exhibitorsm->{'sm' . $i . '_lname'} }}</td>
                        <td class="border py-2 text-center">{{ $exhibitorsm->{'sm' . $i . '_email'} }}</td>
                        <td class="border py-2 text-center">{{ $exhibitorsm->{'sm' . $i . '_designation'} }}</td>
                        <td class="border py-2 text-center">{{ $exhibitorsm->{'sm' . $i . '_mobile'} }}</td>
                        <td class="border py-2 text-center">{{ $exhibitorsm->{'sm' . $i . '_govt_id_type'} }}</td>
                        <td class="border py-2 text-center">{{ $exhibitorsm->{'sm' . $i . '_govt_id_number'} }}</td>
                    </tr>
                    @endif
                @endfor
            </tbody>
        </table>
        @else
        <div class="text-center py-4 text-gray-50 dark:text-gray-50">No exhibitor found</div>
        @endif

        <!-- Stall Manning Form -->
        <div id="stallManningFormContainer" class="mt-4" style="display: none;">
            <form action="{{ route('post_StallManning') }}" method="POST" class="bg-slate-600 dark:bg-slate-800 p-4 rounded-lg shadow-md relative">
                @csrf
                <input type="hidden" name="exhibitor_id" value="{{ $exh_id }}">
                <h5 class="text-lg font-bold mb-4 text-gray-50 dark:text-gray-50">Stall Manning Person</h5>
                <button type="button" id="closeFormButton" class="absolute top-2 right-2 text-gray-50 dark:text-gray-50">
                    <i class="fas fa-times"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if ($total_sm_assigned < $max_sm_allowed)
                    <div class="form-group">
                        <label for="sm_name" class="block text-sm font-medium text-gray-50 dark:text-gray-50">SM Name</label>
                        <input type="text" id="sm_name" name="sm_name" class="form-control mt-1 block w-full bg-white text-gray-700 dark:bg-slate-700 dark:text-gray-50" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_email" class="block text-sm font-medium text-gray-50 dark:text-gray-50">SM Email</label>
                        <input type="email" id="sm_email" name="sm_email" class="form-control mt-1 block w-full bg-white text-gray-700 dark:bg-slate-700 dark:text-gray-50" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_designation" class="block text-sm font-medium text-gray-50 dark:text-gray-50">SM Designation</label>
                        <input type="text" id="sm_designation" name="sm_designation" class="form-control mt-1 block w-full bg-white text-gray-700 dark:bg-slate-700 dark:text-gray-50" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_mobile" class="block text-sm font-medium text-gray-50 dark:text-gray-50">SM Phone</label>
                        <input type="text" id="sm_mobile" name="sm_mobile" class="form-control mt-1 block w-full bg-white text-gray-700 dark:bg-slate-700 dark:text-gray-50" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_govt_id_type" class="block text-sm font-medium text-gray-50 dark:text-gray-50">SM Govt ID Type</label>
                        <input type="text" id="sm_govt_id_type" name="sm_govt_id_type" class="form-control mt-1 block w-full bg-white text-gray-700 dark:bg-slate-700 dark:text-gray-50" required>
                    </div>
                    <div class="form-group">
                        <label for="sm_govt_id_number" class="block text-sm font-medium text-gray-50 dark:text-gray-50">SM Govt ID Number</label>
                        <input type="text" id="sm_govt_id_number" name="sm_govt_id_number" class="form-control mt-1 block w-full bg-white text-gray-700 dark:bg-slate-700 dark:text-gray-50" required>
                    </div>
                    @endif
                </div>
                @if ($total_sm_assigned < $max_sm_allowed)
                <button type="submit" class="btn btn-primary mt-4 bg-slate-500 text-white hover:bg-slate-700">Save changes</button>
                @endif
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formContainer = document.getElementById('stallManningFormContainer');
        const toggleFormButton = document.getElementById('toggleFormButton');
        const closeFormButton = document.getElementById('closeFormButton');

        toggleFormButton.addEventListener('click', function() {
            formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        });

        closeFormButton.addEventListener('click', function() {
            formContainer.style.display = 'none';
        });
    });
</script>

<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle"),
        sidebar = body.querySelector("nav"),
        sidebarToggle = body.querySelector(".sidebar-toggle");

    if(localStorage.getItem("mode") === "dark") {
        body.classList.toggle("dark");
    }

    if(localStorage.getItem("status") === "close") {
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
</script>
