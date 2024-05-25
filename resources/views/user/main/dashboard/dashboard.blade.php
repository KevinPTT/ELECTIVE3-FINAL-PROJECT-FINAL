<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('css/userbooking.css') }}">
        <title>USER</title>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    </head>
<body>
    @include('user.components.header') <!-- Include sidebar component -->
    @include('user.components.sidebar') <!-- Include navbar component -->
<!-- CONTENT -->
<section id="content">
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Books</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Date Order</th>
                            <th>Route</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentBookings as $booking)
                        <tr>
                            <td>
                                <img src="{{ asset('images/logo.png') }}" alt="People">
                                <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                            </td>
                            <td>{{ $booking->journey->booking_date }}</td>
                            <td>{{ $booking->journey->origin }} - {{ $booking->journey->destination }}</td>
                            <td><span class="status {{ $booking->journey->status }}">{{ $booking->journey->status }}</span></td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Todays Booking</h3>
                    <i class='bx bx-plus' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <ul class="todo-list">
                    <li class="completed">
                        <p>{{ $todaysBookingCount }}</p>
                    </li>
                    <li class="completed">
                        <p>Last Week: {{ $lastWeekBookingCount }}</p>
                    </li>
                    <li class="completed">
                        <p>Last Month: {{ $lastMonthBookingCount }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div id="map" style="height: 400px; margin-top: 20px;"></div> <!-- Map container -->
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

    <script src="{{ asset('js/userscript.js') }}"></script>
    <script>
        // Function to generate a random number between min and max
        function getRandomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        // Function to update the total passengers
        function updateTotalPassengers() {
            const totalPassengersElement = document.getElementById('totalPassengers');
            const randomPassengerCount = getRandomNumber(100, 1000); // Change the range as needed
            totalPassengersElement.innerText = randomPassengerCount;
        }

        // Update total passengers on page load
        document.addEventListener('DOMContentLoaded', updateTotalPassengers);

        // Optionally, update total passengers every X seconds
        setInterval(updateTotalPassengers, 5000); // Update every 5 seconds

        // Initialize the map
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([12.8797, 121.7740], 6); // Set the initial view to the Philippines

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Example: Add markers for bus routes
            var routes = [
                { origin: [14.5995, 120.9842], destination: [10.3157, 123.8854], description: 'Manila to Cebu' },
                { origin: [14.5995, 120.9842], destination: [16.4023, 120.5960], description: 'Manila to Baguio' },
                // Add more routes as needed
            ];

            routes.forEach(function(route) {
                var originMarker = L.marker(route.origin).addTo(map)
                    .bindPopup(`Origin: ${route.description}`)
                    .openPopup();

                var destinationMarker = L.marker(route.destination).addTo(map)
                    .bindPopup(`Destination: ${route.description}`)
                    .openPopup();

                var routeLine = L.polyline([route.origin, route.destination], {color: 'blue'}).addTo(map);
            });
        });
    </script>

</body>
</html>
