@include('layouts.formheader')
@include('layouts.form_navbar')

@php
    $exhibitor = session('exhibitor');
@endphp

<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8" style="
    padding-top: 20px; padding-bottom: 1px;">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">

        </div>

    </div>
<div class="container mx-auto max-w-screen-lg">
<div class="mt-8 p-8 bg-white border border-gray-300 rounded-lg">
    <div class="text-left mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Preview of your Exhibitor Profile</h2>
        <p class="mt-2 text-sm text-gray-600">Please review your exhibitor profile before submitting.</p>
    </div>
    <table class="min-w-full bg-white">
        <tbody>
        <!-- Assocication Name,
Booth Size,Sector, Name of Exhibitor (Organisation Name)
Organisation Registration Certificate
Invoice Address, City
State,
Postal Code	,
Telephone Number	,
Website,
GST Number	,
PAN Number	,
Name,
Email,
Mobile,
Designation,
Payment Mode
-->
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Association Name:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Startup Exhibitor</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Booth Size:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">{{$exhibitor->exhibitor_id}}</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Sector:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">{{$exhibitor->sector}}</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Name of Exhibitor:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Organisation Name</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Organisation Registration Certificate:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Registration Certificate</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Invoice Address:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Invoice Address, City, State, Postal Code</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Contact Number:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">+919801217815</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">GST Number:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">GST Number</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">PAN Number:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">PAN Number</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Name:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Name of Contact Person</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Email:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Email </td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Mobile:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">+919801217815</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Designation:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Designation of Contact Person</td>
        </tr>
        <tr class="border-t border-gray-300">
            <td class="py-2 px-4 text-sm font-bold text-gray-800">Payment Mode:</td>
            <td class="py-2 px-4 text-sm font-medium text-gray-800">Payment Mode</td>
        </tr>
        <!-- Company Website, Company Description, Company Address, Company Phone, Company Email -->
        </tbody>
    </table>
    <div class="w-full max-w-6xl mx-auto p-6 md:p-8 mt-8 flex justify-end">
        <div class="w-1/2 max-w-3xl p-6 md:p-8 bg-gray-100 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-black">Payment Summary</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <tbody class="bg-gray-100 divide-y divide-gray-700">
                    <tr class="flex justify-between ">
                        <td class="text-black mb-2 sm:mb-0">Selection Amount</td>
                        <td class="font-medium text-black">Rs. 39999</td>
                    </tr>
                    <tr class="flex justify-between ">
                        <td class="text-black mb-2 sm:mb-0">GST @ 18%</td>
                        <td class="font-medium text-black">Rs. 7200</td>
                    </tr>
                    <tr class="flex justify-between ">
                        <td class="text-black mb-2 sm:mb-0">Processing Charges</td>
                        <td class="font-medium text-black">Rs. 1416</td>
                    </tr>
                    <tr class="flex justify-between font-medium text-lg text-black">
                        <td class="text-black mb-2 sm:mb-0">Total (Including Processing Charges)</td>
                        <td class="text-black">Rs. 48515</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
</div>
</div>
    <!-- Preview of form fields -->

        <div class="mt-8 flex items-center justify-center space-x-4">
            <a href="{{ route('exhibitor.create') }}" class="px-6 py-3 text-sm font-medium text-white bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] rounded-md hover:from-[#ff80b5] hover:to-[#9089fc]">Edit</a>
{{--            <form action="{{ route('') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] rounded-md hover:from-[#ff80b5] hover:to-[#9089fc]">Submit</button>--}}
{{--            </form>--}}
        </div>
