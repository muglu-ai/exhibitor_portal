<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            </div>
        </div>
    <div class="flex justify-center">
        <div class="bg-white w-[calc(100%+8rem)] mx-auto sm:px-1 px-1 max-w-sm rounded overflow-hidden shadow-lg ml-12">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><i class="fas fa-user mr-2"></i>Total Users</div>
                <p class="text-gray-700 font-bold text-base text-center">
                    {{ Auth::user()->no_of_exhibitors }}
                </p>
            </div>
        </div>

        <div class="bg-white w-[calc(100%+8rem)] mx-auto sm:px-1 px-1 max-w-sm rounded overflow-hidden shadow-lg ml-12">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><i class="fas fa-user mr-2"></i>Total Exhibitors</div>
                <p class="text-gray-700 font-bold text-base text-center">
                    {{ Auth::user()->no_of_exhibitors }}
                </p>
            </div>
        </div>

        <div class="bg-white w-[calc(100%+8rem)] mx-auto sm:px-1 px-1 max-w-sm rounded overflow-hidden shadow-lg ml-12 mr-12">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><i class="fas fa-user mr-2"></i>Total Accepted Exhibitors</div>
                <p class="text-gray-700 font-bold text-base text-center">
                    {{ Auth::user()->no_of_exhibitors }}
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
