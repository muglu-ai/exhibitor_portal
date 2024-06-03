<script src="https://cdn.tailwindcss.com"></script>

<main class="container mx-auto my-12 px-4 md:px-6">
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Delegate Registration Form</h2>
        <form action="{{ route('submit_delegate_form', ['token' => $invitation->token]) }}" method="POST" class="grid grid-cols-2 gap-x-4">
            @csrf
            <input type="hidden" name="del_email" value="{{ $invitation->email }}">
            @if ($org_name)
            <div class="mb-4">
                <label for="delegate-org" class="block text-sm font-medium">Organization: {{ $org_name }}</label>
            </div>
            @endif
            <div class="mb-4">
                <label for="delegate-title" class="block text-sm font-medium">Title</label>
                <select id="delegate-title" name="del_title" class="w-full border border-gray-300 rounded-md p-2" required>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Dr.">Dr.</option>
                    <option value="Prof.">Prof.</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="delegate-fname" class="block text-sm font-medium">First Name</label>
                <input type="text" id="delegate-fname" name="del_fname" class="w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="delegate-lname" class="block text-sm font-medium">Last Name</label>
                <input type="text" id="delegate-lname" name="del_lname" class="w-full border border-gray-300 rounded-md p-2" required>
            </div>
            @if ($invitation)
            <div class="mb-4">
                <label for="delegate-email" class="block text-sm font-medium">Email: {{ $invitation->email }}</label>
            </div>
            @endif
            <div class="mb-4">
                <label for="delegate-designation" class="block text-sm font-medium">Designation</label>
                <input type="text" id="delegate-designation" name="del_designation" class="w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="delegate-phone" class="block text-sm font-medium">Phone</label>
                <input type="tel" id="delegate-phone" name="del_contact" class="w-full border border-gray-300 rounded-md p-2" required>
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
                <button type="reset" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md ml-2">Reset</button>
            </div>
        </form>
    </div>
</main>
