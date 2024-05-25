<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/userbooking.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> --}}
    <title>USER</title>
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
					<h1>Book Ticket</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Book Ticket</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Book</a>
						</li>
					</ul>
				</div>
                @include('user.components.popup')
                <a href="#" class="btn-download" onclick="showBookingModal()">
                     <i class='bx bxs-cloud-download'></i>
                    <span class="text">Book Now</span>
                </a>
			</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="product-table">
                <table>
                    <thead>
                        <tr>
                            <th>Routes (Schedule Code)</th>
                            <th>Destination terminal</th>
                            <th>Date </th>
                            <th>Time</th>
                            <th>Total-Seat</th>
                            <th>Vehicle</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($journeys as $journey)
                        <form action="{{ route('status.post', ['id' => $journey->id]) }}" method="POST">
                            @csrf
                            <tr>
                                <td>
                                    <p> {{ $journey->origin}} </p>
                                </td>
                                <td>
                                    <p>{{ $journey->destination  }}</p>
                                </td>
                                <td>
                                    <p>{{ $journey->booking_date }}</p>
                                </td>
                                <td>
                                    <p>{{  $journey->time }}</p>
                                </td>
                                <td>
                                    <p>{{  $journey->available_seats  }}</p>
                                </td>
                                <td>
                                    <p>{{  $journey->vehicle_type }}</p>
                                </td>
                                <td>
                                    <p>{{  $journey->price  }}</p>
                                </td>
                                <td>
                                    <p>{{  $journey->status  }}</p>
                                </td>
                                <td class="actions">
                                    <a class="icons" title="Select" style="color:green" href="{{route('form.forms', ['id' => $journey->id])}}">
                                        <i class="far fa-check-square"></i>
                                    </div>
                                    <div class="icons" title="Select booking" style="color:green">
                                        <i class='bx bxs-select'></i>
                                    </div>
                                    <a class="icons" title="Edit" style="color:orange" href="{{route('journey.show', ['id' => $journey->id])}}">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                <div class="icons" title="Delete journey" style="color:red">
                                    <i class='bx bxs-trash' data-id="{{ $journey->id }}" onclick="deleteJourney(event)"></i>
                                </div>
                            </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                    <div class="pagination-links">
                        {{ $journeys->links('pagination::bootstrap-4') }}
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
</body>
	<!-- CONTENT -->
 <script src="{{ asset('js/userscript.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
document.querySelectorAll('.bx-edit').forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the ID of the journey to be edited
        varjourneyId = this.getAttribute('data-journey-id');

        // Use AJAX to fetch the journey data from the server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/user/main/edibooking' + journeyId + '/edit', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Display the journey data in the edit form
                var journey = JSON.parse(xhr.responseText);
                document.getElementById('journey_id').value = journey.id;
                document.getElementById('booking_date').value = journey.booking_date;
                document.querySelector('select[name="origin"]').value = journey.origin;
                document.querySelector('select[name="destination"]').value = journey.destination;
                document.querySelector('select[name="vehicle_type"]').value = journey.vehicle_type;
                document.getElementById('price').value = journey.price;

                // Show the edit form
                document.getElementById('editForm').style.display = 'block';
            }
        };
        xhr.send();
    });
});
</script>

 <script>
    function deleteJourney(event) {
        var journeyId = event.target.dataset.id;

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this journey!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/journeys/' + journeyId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire('Deleted!', 'Your journey has been deleted.', 'success');
                        location.reload();
                    },
                    error: function(error) {
                        Swal.fire('Error!', 'There was an error deleting your journey.', 'error');
                    }
                });
            }
        });
    }
</script>
 @if(session()->has("success"))
 <div class="warning-messages" style="color:green">
     <script>
         Swal.fire(
             "Success!",
             "Booking has been Created.",
             "success"
         );
     </script>
 </div>
@endif
 <script>
    // Get the modal
    var modal = document.getElementById("bookingModal");

    // Get the book buttons
var bookButtons = document.getElementsByClassName("book-button");

    // Add click event listeners to the book buttons
    for (var i = 0; i < bookButtons.length; i++) {
        bookButtons[i].addEventListener("click", function() {
            // Get the journey ID from the button's data-journey-id attribute
            var journeyId = this.getAttribute("data-journey-id");

            // Set the journey ID in the hidden input field
            document.getElementById("journey_id").value = journeyId;

            // Get the journey details using an AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('journeys.show', ':id') }}".replace(":id", journeyId), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    // Set the price in the price input field
                    document.getElementById("price").value = response.price;

                    // Show the modal
                    modal.style.display = "block";
                }
            };
            xhr.send();
        });
    }

    // Get the close button
    var closeButton = document.getElementsByClassName("close")[0];

    // Add click event listener to the close button
    closeButton.addEventListener("click", function() {
        // Hide the modal
        modal.style.display = "none";
    });

    // Add submit event listener to the booking form
    document.getElementById("bookingForm").addEventListener("submit", function(event) {
        event.preventDefault();

        // Get the form data
        var formData = new FormData(this);

        // Send the AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ route('bookings.store') }}", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the successful response
                console.log(xhr.responseText);
                modal.style.display = "none";
                alert("Booking successful!");
            }
        };
        xhr.send(formData);
    });

</script>




</body>
</html>
