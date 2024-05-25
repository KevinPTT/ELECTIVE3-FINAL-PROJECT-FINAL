<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>ADMIN</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
</head>
<body>
    @extends('admin.layout.app')
    @section('content')
    <section class="main">
        <div class="full-boxer">
          @foreach ($comments as $comment)
            <div class="comment-box">
              <div class="box-top">
                <div class="Profile">
                  <div class="profile-image">
                    <img src="{{ asset('images/logo.png') }}" alt="People">
                  </div>
                  <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $comment->rating)
                        <i class='bx bxs-star' style="color: #ffd700;"></i>
                      @else
                        <i class='bx bx-star' style="color: #ccc;"></i>
                      @endif
                    @endfor
                  </div>
                </div>
                <div class="Name">
                  <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                </div>
              </div>
              <div class="comment">
                <p>{{ $comment->comment }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </section>
</body>
@endsection
</html>
