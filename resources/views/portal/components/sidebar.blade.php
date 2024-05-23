<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="event-details">
            <h4><i class="uil uil-calendar-alt"></i> Prawaas 4.0</h4>
            <h4><i class="uil uil-calendar"></i> Aug 29-31, 2024</h4>
        </div>


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: none;border: none;padding: 0;">
                <img src="{{asset('logos/banner.png')}}" alt="">
            </button>
        </form>
    </div>
