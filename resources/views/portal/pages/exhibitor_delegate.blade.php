@include('portal.components.header')
@include('portal.components.sidebar')
<script src="https://cdn.tailwindcss.com"></script>

@php
$exh_id = session('exhibitor_id');
@endphp
@if(session('success'))
<div class="bg-green-500 text-white p-4 rounded-md mb-4">
    {{ session('success') }}
</div>
@endif

<main class="container mx-auto my-12 px-4 md:px-6">
    <div class="space-y-6">
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
            <div class="flex flex-col space-y-1.5 p-6 bg-gray-600 ">
                <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Delegate Information</h3>
            </div>
            <div class="p-6">
                <div class="relative w-full overflow-auto">
                    @if($delegate->isNotEmpty())
                    <table class="w-full caption-bottom text-sm">
                        <thead class="[&amp;_tr]:border-b">
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    Name
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    Email
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    Designation
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    Phone
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    Category
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    ID Type
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400  [&amp;:has([role=checkbox])]:pr-0">
                                    ID Number
                                </th>
                            </tr>
                        </thead>

                        <tbody class="[&amp;_tr:last-child]:border-0">
                            @foreach($delegate as $del)
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    <div class="flex items-center gap-2">
                                        <div>{{ $del->del_title }} {{ $del->del_fname }} {{ $del->del_lname }}</div>
                                    </div>
                                </td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $del->del_email }}</td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $del->del_designation }}</td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $del->del_contact }}</td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $del->del_type }}</td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $del->del_govtid_type }}</td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{ $del->del_govtid_no }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>
                    @else
                    <p class="px-4 py-3">No stall manning details found.</p>
                    @endif
                    @if($invited_Delegates->isNotEmpty())
                    <!-- Add a table of invited delegates -->
                    <table class="w-full caption-bottom text-sm">
                        <thead class="[&amp;_tr]:border-b">
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400 [&amp;:has([role=checkbox])]:pr-0">
                                    Invited Delegates
                                </th>
                                <th class="h-12 px-4 text-left align-middle font-semibold text-lg text-muted-foreground bg-gray-400 [&amp;:has([role=checkbox])]:pr-0">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="[&amp;_tr:last-child]:border-0">
                            @foreach($invited_Delegates as $del)
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    <div class="flex items-center gap-2">
                                        <div>{{ $del->email }}</div>
                                    </div>
                                </td>
                                <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                    <!-- Resend button -->
                                    <form action="{{ route('resend_invitation', ['email' => $del->email]) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Resend</button>
                                    </form>

                                    <!-- Cancel button -->
                                    <form action="{{ route('cancel_invitation', ['email' => $del->email]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Cancel</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
                <div id="form-container" class="hidden">
                    <div class="relative w-full overflow-auto">
                        <div class="p-6 bg-white shadow-md rounded-lg">
                            <div class="flex justify-end mb-4">
                                <button type="button" onclick="toggleForm()" id="form-close-btn" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <h2 class="text-xl font-semibold mb-4">Add Delegate</h2>
                            <form action="{{route('post_ExhibitorDelegate')}}" method="POST" class="grid grid-cols-2 gap-x-4">
                                <input type="hidden" name="exhibitor_id" value="{{ $exh_id }}">
                                @csrf
                                <div class="mb-4">
                                    <label for="delegate-title" class="block text-sm font-medium">Title</label>
                                    <select id="delegate-title" name="del_title" class="w-full border border-gray-300 rounded-md p-2">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-fname" class="block text-sm font-medium">First Name</label>
                                    <input type="text" id="delegate-fname" name="del_fname" class="w-full border border-gray-300 rounded-md p-2">
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-lname" class="block text-sm font-medium">Last Name</label>
                                    <input type="text" id="delegate-lname" name="del_lname" class="w-full border border-gray-300 rounded-md p-2">
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-email" class="block text-sm font-medium">Email</label>
                                    <input type="email" id="delegate-email" name="del_email" class="w-full border border-gray-300 rounded-md p-2">
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-designation" class="block text-sm font-medium">Designation</label>
                                    <input type="text" id="delegate-designation" name="del_designation" class="w-full border border-gray-300 rounded-md p-2">
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-phone" class="block text-smfont-medium">Phone</label>
                                    <input type="tel" id="delegate-phone" name="del_contact" class="w-full border border-gray-300 rounded-md p-2">
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-id-type" class="block text-sm font-medium">ID Type</label>
                                    <select id="delegate-id-type" name="del_govtid_type" class="w-full border border-gray-300 rounded-md p-2">
                                        <option value="Aadhar Card">Aadhar Card</option>
                                        <option value="PAN Card">PAN Card</option>
                                        <option value="Passport">Passport</option>
                                        <option value="Driving License">Driving License</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="delegate-id-number" class="block text-sm font-medium">ID Number</label>
                                    <input type="text" id="delegate-id-number" name="del_govtid_no" class="w-full border border-gray-300 rounded-md p-2">
                                </div>
                                <div class="flex justify-end col-span-2">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
                                    <button type="button" onclick="toggleForm()" id="form-cancel-btn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md ml-2">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    @if($exhibitor_del_count > ($delegate_registered + $invited_Delegate_count )) <button id="toggle-form" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground hover:bg-secondary/80 h-10 px-4 py-2" type="button">
                        Add Delegate
                    </button>
                    <button id="toggle-invite-form" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-green-500 text-white hover:bg-green-600 h-10 px-4 py-2 ml-2" type="button">
                        Invite Delegate
                    </button>
                    @endif
                </div>

                <div id="invite-form-container" class="hidden mt-4">
                    <div class="relative w-full overflow-auto">
                        <div class="p-6 bg-white shadow-md rounded-lg">
                            <div class="flex justify-end mb-4">
                                <button type="button" onclick="toggleInviteForm()" id="invite-form-close-btn" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <h2 class="text-xl font-semibold mb-4">Invite Delegate</h2>
                            <form action="{{route('send_invitation')}}" method="POST">
                                @csrf
                                <input type="hidden" name="exhibitor_id" value="{{ $exh_id }}">
                                <div class="mb-4">
                                    <label for="invite-email" class="block text-sm font-medium">Email</label>
                                    <input type="email" id="invite-email" name="invite_email" class="w-full border border-gray-300 rounded-md p-2" required>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Send Invitation</button>
                                    <button type="button" onclick="toggleInviteForm()" id="invite-form-cancel-btn" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md ml-2">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleForm() {
            const formContainer = document.getElementById('form-container');
            formContainer.classList.toggle('hidden');
        }

        function toggleInviteForm() {
            const inviteFormContainer = document.getElementById('invite-form-container');
            inviteFormContainer.classList.toggle('hidden');
        }

        document.getElementById('toggle-form').addEventListener('click', function() {
            toggleForm();
        });

        document.getElementById('toggle-invite-form').addEventListener('click', function() {
            toggleInviteForm();
        });

        document.getElementById('form-cancel-btn').addEventListener('click', function() {
            toggleForm();
        });

        document.getElementById('invite-form-cancel-btn').addEventListener('click', function() {
            toggleInviteForm();
        });

        document.getElementById('form-close-btn').addEventListener('click', function() {
            toggleForm();
        });

        document.getElementById('invite-form-close-btn').addEventListener('click', function() {
            toggleInviteForm();
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
