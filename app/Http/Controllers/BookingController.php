<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Journey;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
        return view('bookings.create');
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
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $booking = Booking::findOrFail($id);
    //     $booking->update($request->all());
    //     return redirect()->route('bookings.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('bookings.index');
    }

    public function pages()
    {
        $journeys = Journey::paginate(10); // Paginate ang mga journeys, 10 items bawat page
        return view('user.main.booking.booking')->with('journeys', $journeys);
    }


    public function submit(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            // 'first_name' => 'required|string',
            // 'last_name' => 'required|string',
            // 'gender' => 'required|in:male,female',
            // 'email' => 'required|email',
            // 'phone_number' => 'required|string',
            // 'address' => 'required|string',
            'seat_number' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // Create a new booking
        $journey = Journey::findOrFail($id);
        $user = Auth::user();

        // Update the status of the journey
        $journey->status = 'processing';
        $journey->save();

        $bookings = new Booking($validatedData);
        $bookings->journey_id = $id;
        $bookings->save();

        // Redirect or return a response as needed
        return redirect(route('booking'))->with('success', 'Booking successful!');
    }



    // public function index()
    // {
    //     // Retrieve all tickets with a processing or completed journey status
    //     $tickets = Booking::whereHas('journey', function ($query) {
    //         $query->whereIn('status', ['processing', 'completed']);
    //     })
    //     ->with('journey:id,origin,destination,date,price,status')
    //     ->select('id', 'journey_id', 'payment_method', 'seat_number')
    //     ->get();

    //     return view('admin.main.booking.booking', compact('tickets'));
    // }




    public function schedule()
    {
              // Retrieve all scheduled tickets
              $tickets = Booking::whereHas('journey', function ($query) {
                $query->where('status', 'scheduled');
            })->get();

            return view('admin.main.booking.schedule')->with('tickets', $tickets); // I-return ang view na may data ng journeys
    }





    public function acceptTicket(Request $request)
    {
        // Retrieve the ticket using the ID from the request
        $ticket = Booking::findOrFail($request->id);

        // Update the ticket status to "scheduled"
        $ticket->journey->status = 'scheduled';
        $ticket->journey->save();

        // Redirect the user to the scheduled page
        return view('admin.main.booking.booking', compact('tickets'));
    }



    public function index()
    {
       // Retrieve all tickets with a processing or completed journey status
       $tickets = Booking::whereHas('journey', function ($query) {
        $query->whereIn('status', ['processing', 'completed']);
    })
    ->with('journey:id,origin,destination,date,price,status')
    ->select('id', 'journey_id', 'payment_method', 'seat_number')
    ->get();

    return view('admin.main.booking.booking', compact('tickets'));
    }





public function showForm($journeyId) {
    // Fetch the authenticated user
    $user = Auth::user();

    // Fetch the journey based on the provided ID
    $journey = Journey::findOrFail($journeyId);

    // Pass the user and journey data to the view
    return view('user.components.form', compact('user', 'journey'));
}


public function recentBookings()
{
    $recentBookings = Booking::latest()->take(5)->with('journey')->get();
    $totalBookingCount = Booking::count();
    $todaysBookingCount = Booking::whereDate('created_at', now()->today())->count();
    $lastWeekBookingCount = Booking::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
    $lastMonthBookingCount = Booking::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
    return view('user.main.dashboard.dashboard', compact('recentBookings', 'totalBookingCount', 'todaysBookingCount', 'lastWeekBookingCount', 'lastMonthBookingCount'));
}



public function dashboard(Request $request)
{
    $totalReceivedTickets = Booking::where('status', 'received')->count();
    $userData = $this->getUserData();

    $totalBookingCount = Booking::count();
    $todaysBookingCount = Booking::whereDate('created_at', now()->today())->count();
    $lastWeekBookingCount = Booking::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
    $lastMonthBookingCount = Booking::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();

    $totalUsers = User::where('role', '!=', 'admin')->count();
    $totalPassengers = $request->input('randomPassenger', 0);

    return view('admin.main.dashboard.dashboard', compact('userData','totalReceivedTickets', 'totalBookingCount', 'todaysBookingCount', 'lastWeekBookingCount', 'lastMonthBookingCount', 'totalUsers', 'totalPassengers'));
}

public function getUserData()
{
    $userId = Auth::id(); // Get the ID of the logged-in user
    $userData = User::find($userId); // Fetch the user data from the database

    return $userData;
}



}
