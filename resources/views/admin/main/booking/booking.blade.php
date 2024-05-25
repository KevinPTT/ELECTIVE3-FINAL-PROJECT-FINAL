<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>ADMIN</title>
      <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <body>
        @extends('admin.layout.app')
        @section('content')
        <section class="attendance">
            <div class="attendance-list">
              <h1>Processing List</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Passenger Name</th>
                    <th>Route</th>
                    <th>Departure (Date & Time)</th>
                    <th>Ticket Price</th>
                    <th>Payment</th>
                    <th>Seat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tickets as $ticket)
                    <tr>
                      <td>{{ $ticket->id }}</td>
                      <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                      <td>{{ $ticket->journey->origin }} - {{ $ticket->journey->destination }}</td>
                      <td>{{ $ticket->journey->date }}</td>
                      <td>{{ $ticket->journey->price }}</td>
                      <td>{{ $ticket->payment_method }}</td>
                      <td>{{ $ticket->seat_number }}</td>
                      <td>{{ $ticket->journey->status }}</td>
                      <td>
                        <!-- Add the Accept button here -->
                        <form action="{{ route('admin.accept-ticket', ['id' => $ticket->id]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-primary">Accept</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </section></section>
      </div>
    </head>
    </body>
    </html>
    </span>
    @endsection


