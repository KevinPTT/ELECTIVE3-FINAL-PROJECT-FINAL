<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Registration Form</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="{{ asset('css/userbooking.css') }}">
    <link rel="stylesheet" href="{{ asset('css/userform.css') }}">
    <!-- Font Awesome Link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@include('user.components.header') <!-- Include sidebar component -->
@include('user.components.sidebar') <!-- Include navbar component -->
<form action="{{ route('submit.post', ['id' => $journey->id]) }}" method="POST">
    @csrf
    <div class="grid">
        <div class="wrapper">
            <div class="title">
                Customer Identity
            </div>
            @if($errors->any())
                <div class="warning-messages" style="color:red">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form">
                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="input" value="{{ auth()->user()->first_name }}" readonly>
                </div>
                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="input" value="{{ auth()->user()->last_name }}"  readonly>
                </div>
                <div class="inputfield">
                    <label>Gender</label>
                    <div class="custom_select" style="pointer-events: none; opacity: 0.5;">
                        <select name="gender" disabled>
                            <option value="">Select</option>
                            <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>

                <div class="inputfield">
                    <label>Email Address</label>
                    <input type="text" name="email" class="input" value="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="inputfield">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="input" value="{{ auth()->user()->phone_number }}" readonly>
                </div>
                <div class="inputfield">
                    <label>Address</label>
                    <textarea name="address" class="textarea" readonly>{{ auth()->user()->address }}</textarea>
                </div>

                <div class="inputfield">
                    <label>Seat Number</label>
                    <div class="custom_select">
                        <select name="seat_number">
                            <option value="">Select</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}" {{ old('seat_number') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper1">
            <div class="title">
                Payment Method
            </div>
            <div class="form">
                <div class="inputfield">
                    <label>Select Bank</label>
                    <div class="custom_select">
                        <select name="payment_method">
                            <option value="">Select</option>
                            <option value="Gcash" {{ old('payment_method') == 'Gcash' ? 'selected' : '' }}>Gcash</option>
                            <option value="On Condoctor" {{ old('payment_method') == 'On Condoctor' ? 'selected' : '' }}>On Condoctor</option>
                        </select>
                    </div>
                </div>
                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name="terms_and_conditions" {{ old('terms_and_conditions') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agreed to terms and conditions</p>
                </div>
                <div class="inputfield">
                    <input type="submit" value="Proceed" class="btn">
                    <input type="hidden" name="status" value="{{ $journey->status }}">
                </div>
            </div>
        </div>
    </div>
</form>


<script src="{{ asset('js/userscript.js') }}"></script>
<script>
    $(document).ready(function() {
// Delete booking
$('.delete-btn').click(function() {
    var bookingId = $(this).data('id');
    var confirmDelete = confirm('Are you sure you want to delete this booking?');

    if (confirmDelete) {
        $.ajax({
            url: '/bookings/' + bookingId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Booking deleted successfully');
                location.reload();
            },
            error: function(error) {
                alert('Error deleting booking');
            }
        });
    }
});
});
</script>
</html>
