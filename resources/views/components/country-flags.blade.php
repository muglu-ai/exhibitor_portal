@foreach($countries as $country)
    <img src="{{ asset('vendor/blade-flags/country-' . strtolower($country->code) . '.svg') }}" width="32" height="32" alt="{{ $country->name }}">
@endforeach

{{ $countries->links() }}
