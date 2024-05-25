<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/userbooking.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feedback.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Form Reviews</title>
</head>
@include('user.components.header') <!-- Include sidebar component -->
@include('user.components.sidebar') <!-- Include navbar component -->

<body>
    <div class="wrapper">
        <h3>Give us your valuable feedback</h3>
        <form method="POST" action="{{ route('feedback.post') }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="rating">
                <input type="number" name="rating" id="ratingInput" hidden>
                <i class='bx bx-star star' data-value="1" style="--i: 0;"></i>
                <i class='bx bx-star star' data-value="2" style="--i: 1;"></i>
                <i class='bx bx-star star' data-value="3" style="--i: 2;"></i>
                <i class='bx bx-star star' data-value="4" style="--i: 3;"></i>
                <i class='bx bx-star star' data-value="5" style="--i: 4;"></i>
            </div>

            @if ($errors->has('rating'))
                <div id="rating-error" class="error">{{ $errors->first('rating') }}</div>
            @endif
            <textarea name="comment" cols="30" rows="5" placeholder="Your opinion..."></textarea>
            <div class="btn-group">
                <button type="submit" class="btn submit">Submit</button>
                <button type="button" class="btn cancel" onclick="window.history.back();">Cancel</button>
            </div>
        </form>
    </div>
</body>














<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                let value = this.getAttribute('data-value');
                ratingInput.value = value; // Update the input value

                stars.forEach(star => {
                    star.classList.remove('selected');
                });

                this.classList.add('selected');
                // Add the selected class up to the clicked star
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('selected');
                }
            });
        });
    });
    </script>

</html>
