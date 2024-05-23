<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Event Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's Event information to add Exhibitors Information.") }}
        </p>
    </header>

{{--    <form id="send-verification" method="post" action="{{ route('verification.send') }}">--}}
{{--        @csrf--}}
{{--    </form>--}}

    <form method="POST" action="{{ route('event.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autofocus autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>
        <div>
            <x-input-label for="event_name" :value="__('Event Name')" />
            @if ($user->no_of_exhibitors)
            <x-text-input id="event_name" name="event_name" type="text" class="mt-1 block w-full" :value="old('event_name', $user->event_name)" required autofocus autocomplete="event_name" readonly />
            @else
            <x-text-input id="event_name" name="event_name" type="text" class="mt-1 block w-full" :value="old('event_name', $user->event_name)" required autofocus autocomplete="event_name"  />
            <x-input-error class="mt-2" :messages="$errors->get('event_name')" />
            @endif
        </div>
        <div>
            <x-input-label for="event_website" :value="__('Event Website')" /> @if ($user->no_of_exhibitors)
            <x-text-input id="event_website" name="event_website" type="text" class="mt-1 block w-full" :value="old('event_website', $user->event_website)" required autofocus autocomplete="event_website" readonly />
             @else
             <x-text-input id="event_website" name="event_website" type="text" class="mt-1 block w-full" :value="old('event_website', $user->event_website)" required autofocus autocomplete="event_website" />
             @endif 
            <x-input-error class="mt-2" :messages="$errors->get('event_website')" />
        </div>
        <div>
            <x-input-label for="event_year" :value="__('Event Year')" />
             @if ($user->no_of_exhibitors)
            <x-text-input id="event_year" name="event_year" type="text" class="mt-1 block w-full" :value="old('event_year', $user->event_year)" required autofocus autocomplete="event_year" readonly />
             @else
             <x-text-input id="event_year" name="event_year" type="text" class="mt-1 block w-full" :value="old('event_year', $user->event_year)" required autofocus autocomplete="event_year" />
              @endif
              <x-input-error class="mt-2" :messages="$errors->get('event_year')" />
        </div>

        <div>
            <x-input-label for="no_of_exhibitors" :value="__('No Of Exhibitors')" />
            @if ($user->no_of_exhibitors)
                <select id="no_of_exhibitors" name="no_of_exhibitors" class="mt-1 block w-full" disabled>
                    <option value="500" {{ old('no_of_exhibitors', $user->no_of_exhibitors) == 500 ? 'selected' : '' }}>500</option>
                    <option value="1000" {{ old('no_of_exhibitors', $user->no_of_exhibitors) == 1000 ? 'selected' : '' }}>1000</option>
                    <option value="1500" {{ old('no_of_exhibitors', $user->no_of_exhibitors) == 1500 ? 'selected' : '' }}>1500</option>
                    <!-- Add more options as needed -->
                </select>
            @else
                <select id="no_of_exhibitors" name="no_of_exhibitors" class="mt-1 block w-full">
                    <option value="500" {{ old('no_of_exhibitors', $user->no_of_exhibitors) == 500 ? 'selected' : '' }}>500</option>
                    <option value="1000" {{ old('no_of_exhibitors', $user->no_of_exhibitors) == 1000 ? 'selected' : '' }}>1000</option>
                    <option value="1500" {{ old('no_of_exhibitors', $user->no_of_exhibitors) == 1500 ? 'selected' : '' }}>1500</option>
                    <!-- Add more options as needed -->
                </select>
            @endif
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('no_of_exhibitors')" />
        </div>


        <div class="flex items-center gap-4">
            @if ($user->no_of_exhibitors)
                {{-- <x-primary-button disabled>{{ __('Save') }}</x-primary-button> --}}
            @else
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            @endif

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
