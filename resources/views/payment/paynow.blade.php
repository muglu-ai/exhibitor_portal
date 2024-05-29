{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Cashfree Checkout Integration</title>--}}
{{--    <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="row">--}}
{{--    <h2>Cashfree Checkout Integration</h2>--}}
{{--    <p>Payment ID:{{ $pay_id }} </p>--}}

{{--    <p>Click below to open the checkout page in current tab</p>--}}
{{--    <button id="renderBtn">Pay Now</button>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}
<!--
// v0 by Vercel.
// https://v0.dev/t/xt8BHZGpIUR
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- tailwind css -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>

    <title>Payment </title>
    <style>

        .logo {
            width: 30%;
            height: auto;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div class="w-full max-w-[600px] mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-950 dark:text-gray-50">
    <div class="p-6 md:p-8">
        <div class="flex items center justify-between mb-6">

            <div class="w-full max-w-[600px] mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-950 dark:text-gray-50">
                <div class="p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gray-100 rounded-full p-2 dark:bg-gray-800">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="h-6 w-6 text-gray-500 dark:text-gray-400"
                                >
                                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                    <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold">Provisional Receipt</h2>
                        </div>
                        <div class="bg-gray-100 rounded-full p-2 dark:bg-gray-800">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-6 w-6 text-gray-500 dark:text-gray-400"
                            >
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                        </div>
                    </div>
                    <img
                        src="{{ asset('logos/logo.webp') }}"
                        alt="Event Image"
                        class="w-full rounded-lg mb-6 logo"

                    />
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- TIN NUmber -->
                        <div>
                            <h3 class="text-lg font-semibold mb-2">TIN Number</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $exhibitor->tin_no}}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Organisation Name</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $exhibitor->org_name}}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Booth Size</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $exhibitor->booth_size }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Sector</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $exhibitor->sector }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Exhibitor Name</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $exhibitor->org_name }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Contact</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{$exhibitor->cp_email}}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Phone</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{$exhibitor->cp_mobile}}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Pay Status</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{$exhibitor->pay_status}}</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Payment Summary</h3>
                        <div class="grid grid-cols-2 gap-2 mb-4">
                            <p class="text-gray-500 dark:text-gray-400">Selection Amount</p>
                            <p class="text-right">{{$exhibitor->amt_ext . $exhibitor->selection_amount }} </p>
                            <p class="text-gray-500 dark:text-gray-400">GST (18%)</p>
                            <p class="text-right">{{$exhibitor->amt_ext . $exhibitor->tax_amount }}</p>
                            <p class="text-gray-500 dark:text-gray-400">Processing Charges</p>
                            <p class="text-right">{{$exhibitor->amt_ext . $exhibitor->processing_charge }} </p>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-800 pt-4">
                            <div class="flex items-center justify-between">
                                <p class="text-lg font-semibold">Total</p>
                                <p class="text-lg font-semibold">{{$exhibitor->amt_ext . $exhibitor->total_amount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 text-center"></div>
                    <!-- Pay Now Button -->
                    <div class="mt-8 flex items-center justify-center space-x-4 mb-10">
                        <button id="renderBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Pay Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<footer class="bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 py-4">
    <div class="max-w-[800px] mx-auto flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a class="hover:text-gray-900 dark:hover:text-gray-50" href="#">
                Follow us on facebook
            </a>
            <div data-orientation="vertical" role="none" class="shrink-0 bg-gray-100 h-full w-[1px]">
                <a class="hover:text-gray-900 dark:hover:text-gray-50" href="#">
                    twitter
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
        const cashfree = Cashfree({
            mode: "sandbox",
        });
        document.getElementById("renderBtn").addEventListener("click", () => {
            let checkoutOptions = {
                paymentSessionId: "{{ $pay_id }}",
                redirectTarget: "_self",
            };
            cashfree.checkout(checkoutOptions);
        });
    </script>
</body>
</html>




