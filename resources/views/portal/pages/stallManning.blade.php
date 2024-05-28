@include('portal.components.header')
@include('portal.components.sidebar')
<script src="https://cdn.tailwindcss.com"></script>

@php
$exh_id = session('exhibitor_id');
@endphp

<div class="container mx-auto py-12 px-4 md:px-6">
    <div class="space-y-8">
        <div class="flex justify-between items-center">
            @if($stall_manning_count < $sm_count)
                <button id="showFormButton" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-70 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                    Add New Person
                </button>
            @endif
        </div>
        <div class="border rounded-lg shadow-sm overflow-hidden">
            @if($exhibitor_sm->isNotEmpty())
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-500">
                        <th class="px-4 py-3 text-left font-medium">Name</th>
                        <th class="px-4 py-3 text-left font-medium">Email</th>
                        <th class="px-4 py-3 text-left font-medium">Designation</th>
                        <th class="px-4 py-3 text-left font-medium">Phone</th>
                        <th class="px-4 py-3 text-left font-medium">Gov. ID Type</th>
                        <th class="px-4 py-3 text-left font-medium">Gov. ID Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exhibitor_sm as $stall)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-3">{{ $stall->sm_title }} {{ $stall->sm_fname }} {{ $stall->sm_lname }}</td>
                        <td class="px-4 py-3">{{ $stall->sm_email }}</td>
                        <td class="px-4 py-3">{{ $stall->sm_designation }}</td>
                        <td class="px-4 py-3">{{ $stall->sm_mobile }}</td>
                        <td class="px-4 py-3">{{ $stall->sm_govt_id_type }}</td>
                        <td class="px-4 py-3">{{ $stall->sm_govt_id_number }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="px-4 py-3">No stall manning details found.</p>
            @endif
        </div>

        @if($stall_manning_count < $sm_count)
        <form id="stallManningForm" action="{{ route('post_StallManning') }}" method="POST" class="border rounded-lg shadow-sm hidden">
            <input type="hidden" name="exhibitor_id" value="{{ $exh_id }}">
            @csrf
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">Add New Person</h3>
                        <button type="button" id="closeFormButton" class="text-lg focus:outline-none">&times;</button>
                    </div>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_title">Title</label>
                        <input class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_title" name="sm_title" placeholder="Enter title" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_fname">First Name</label>
                        <input class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_fname" name="sm_fname" placeholder="Enter first name" />
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_lname">Last Name</label>
                    <input class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_lname" name="sm_lname" placeholder="Enter last name" />
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_email">Email</label>
                    <input class="h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_email" name="sm_email" placeholder="Enter email" type="email" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_designation">Designation</label>
                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_designation" name="sm_designation" placeholder="Enter designation" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_mobile">Phone</label>
                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_mobile" name="sm_mobile" placeholder="Enter phone number" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_govt_id_type">Government ID Type</label>
                        <select id="sm_govt_id_type" name="sm_govt_id_type" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70">
                            <option value="">Select ID type</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="sm_govt_id_number">Government ID Number</label>
                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-70" id="sm_govt_id_number" name="sm_govt_id_number" placeholder="Enter ID number" />
                    </div>
                </div>
            </div>
            <div class="items-center p-6 flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-70 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                    Save
                </button>
            </div>
        </form>
        @endif
    </div>
</div>

<script>
    // JavaScript to toggle form visibility
    document.addEventListener('DOMContentLoaded', function() {
        const showFormButton = document.getElementById('showFormButton');
        const stallManningForm = document.getElementById('stallManningForm');
        const closeFormButton = document.getElementById('closeFormButton');

        // Show form on button click
        showFormButton.addEventListener('click', function() {
            stallManningForm.classList.remove('hidden');
        });

        // Hide form on close button click
        closeFormButton.addEventListener('click', function() {
            stallManningForm.classList.add('hidden');
        });
    });
</script>

