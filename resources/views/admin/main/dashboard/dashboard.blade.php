<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMIN</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    </head>


@include('admin.components.header') <!-- Include sidebar component -->
@include('admin.components.sidebar') <!-- Include navbar component -->
<div class="main-content">
    <section>
        <h3 class="section-head">Overview</h3>
        <div class="analytics">
            <div class="analytic">
                <div class="analytic-icon">
                    <span class="las la-eye"> </span>
                </div>
                <div class="analytic-info">
                    <h4>Total BookingTickets</h4>
                    <h1>{{ $totalBookingCount }}</h1>
                </div>
            </div>
            <div class="analytic">
                <div class="analytic-icon">
                    <span class="las la-clock"> </span>
                </div>
                <div class="analytic-info">
                    <h4>Total passengers</h4>
                    <h1 id="totalPassengers">-<small class="text-danger"></small></h1>
                </div>
            </div>
            <div class="analytic">
                <div class="analytic-icon">
                    <span class="las la-users"> </span>
                </div>
                <div class="analytic-info">
                    <h4>Total Users</h4>
                    <h1>{{ $totalUsers }}</h1>
                </div>
            </div>
        </div>
        <div id="map" style="height: 400px; margin-top: 20px;"></div> <!-- Map container -->
    </section>
</div>



</section>
</div>
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
        var map = L.map('map').setView([12.8797, 121.7740], 5); // Set the initial view to the Philippines

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // You can add markers, popups, and other features here
        var marker = L.marker([12.8797, 121.7740]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();
    });
</script>


<script>
    $(document).ready(function() {
        $('#totalPassengers').text('{{ $totalPassengers }}');
    });
    </script>
  <script>
    $(document).ready(function() {
        $('#totalPassengers').text(Math.floor(Math.random() * 100) + 1);
    });
    </script>

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
</script>
