<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Booking;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('journeys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $journey = Journey::findOrFail($id);
    //     return view('journeys.show', compact('journey'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $journey = Journey::findOrFail($id);
    //     return view('journeys.edit', compact('journey'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $journey = Journey::findOrFail($id);
    //     $journey->update($request->all());
    //     return redirect()->route('journeys.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $journey = Journey::findOrFail($id);
    //     $journey->delete();
    //     return redirect()->route('journeys.index');
    // }


    // JourneyController.php
public function journey(Request $request)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'booking_date' => 'required|date',
        'origin' => 'required|string',
        'destination' => 'required|string',
        'price' => 'required|numeric',
        'vehicle_type' => 'required|string',
    ]);

    // Check for duplicate bookings
    $duplicates = DB::table('journeys')
        ->where('booking_date', $validatedData['booking_date'])
        ->where('origin', $validatedData['origin'])
        ->where('destination', $validatedData['destination'])
        ->where('vehicle_type', $validatedData['vehicle_type'])
        ->count();

    // If there are any duplicate bookings, show an error message
    if ($duplicates > 0) {
        return redirect()->back()->withErrors(['error' => 'There is already a booking for this route, date, and vehicle type.']);
    }

    // Create a new Journey record
    $journey = Journey::create($validatedData);

    // Redirect or respond with success message
    return redirect(route('journey.index'))->with('success', 'Journey created successfully!');
}






public function login()
{
    $journeys = Journey::paginate(10); // Paginate ang mga journeys, 10 items bawat page
    return view('user.userlogin')->with('journeys', $journeys);
}


public function index()
{
    $journeys = Journey::paginate(10); // Paginate ang mga journeys, 10 items bawat page

    return view('user.main.booking.booking')->with('journeys', $journeys); // I-return ang view na may data ng journeys
}


public function destroy(Request $request, $id)
{
    $journey = Journey::findOrFail($id);

    // Delete the journey
    $journey->delete();

    // Return a response
    return response()->json(['message' => 'Journey deleted successfully']);
}


public function edit(Request $request, $id)
{
    $journey = Journey::findOrFail($id);

    return view('journey.editbook', compact('journey'));
}


public function update(Request $request, $id)
{
    $journey = Journey::findOrFail($id);

    $validatedData = $request->validate([
        'booking_date' => 'required|date',
        'origin' => 'required',
        'destination' => 'required',
        'vehicle_type' => 'required',
    ]);

    $journey->booking_date = $validatedData['booking_date'];
    $journey->origin = $validatedData['origin'];
    $journey->destination = $validatedData['destination'];
    $journey->vehicle_type = $validatedData['vehicle_type'];
    $journey->save();

    return redirect()->route('journeys.index')->with('success', 'Journey updated successfully.');
}

public function show(Request $request, $id)
{
    $journey = Journey::findOrFail($id); // Retrieve the journey with the given id


    return view('user.components.editbooking')->with('journey', $journey);
}



public function forms(Request $request, $id)
{
    $journey = Journey::findOrFail($id); // Retrieve the journey with the given id

    return view('user.components.form')->with('journey', $journey);
}







public function status($id)
{
    // Validate the request data
    // $request->validate([
    //     'origin' => 'required|string',
    //     'destination' => 'required|string',
    //     // Add validation rules for other fields as needed
    // ]);

    // Retrieve the Journey instance by ID
    $journey = Journey::findOrFail($id);
    // Update the journey with the form data
    // $journey->update([
    //     'origin' => $request->input('origin'),
    //     'destination' => $request->input('destination'),
    //     // Fill other fields here
    // ]);

    // Check if the journey is filled up
    if ($journey->available_seats <= 0) {
        // Update the status to "processing"
        $journey->update(['status' => 'processing']);
    }

    // Redirect back or to a success page
    return redirect()->route('journeys.index')->with('success', 'Journey updated successfully.');
}


public function userlogin()
{
    return view('user.userregister');
}



// public function  acceptTicket(Request $request, $id)
// {
//     // Find the journey by ID
//     $journey = Journey::findOrFail($id);

//     // Update the journey status to "scheduled"
//     $journey->status = 'scheduled';
//     $journey->save();

//     // Redirect back to the journey page with a success message
//     return redirect()->back()->with('success', 'Journey accepted!');
// }



public function acceptTicket(Request $request, $journey_id)
{
    // Find the journey by ID
    $journey = Journey::findOrFail($journey_id);

    // Update the journey status to "scheduled"
    $journey->status = 'scheduled';
    $journey->save();

    // Redirect back to the ticket list page with a success message
    return redirect()->route('admin.main.booking')->with('success', 'Journey accepted!');
}



//     public function showForm(Request $request, $id)
// {
//     $journey = Journey::findOrFail($id);
//     $user = $journey->user;
//     $user = User::find(1);


//     return view('user.components.form', ['journey' => $journey, 'user' => $user]);
// }





}
