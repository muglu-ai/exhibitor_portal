<?php

namespace App\Http\Controllers;

use Faker\Core\DateTime;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use App\Http\Requests\EventUpdate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;



class EventController extends Controller
{
    //
    /**
     * Update your event Details form.
     */
    public function edit(Request $request): View
    {
        return view('event_details.edit', [
            'user' => $request->user(),
        ]);
    }






    public function update(EventUpdate $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            //insert into database
            $request->user()->email_verified_at = "25/02/2024";
        }

        //update database with new values
        $request->user()->email_verified_at = now();
        $request->user()->save();

        //Create tables specific to the event in the database
        $eventName = $request->user()->event_name;
        $eventYear = $request->user()->event_year;
        $request->user()->createTables($eventName, $eventYear);

        //return Redirect::route('/')->with('status', 'event-updated');
        return Redirect::route('event.edit')->with('status', 'event-updated');
    }
}
