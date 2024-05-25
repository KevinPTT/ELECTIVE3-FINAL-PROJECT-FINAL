<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<section id="sidebar">
    <a href="#" class="brand">
        <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="logo-image">
    </a>
    @auth
    <div class="user-name">
        <span class="user">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
        <hr>
    </div>
@endauth
    <ul class="side-menu top">
        <li>
            <a href="{{ route('dashboard')  }}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('booking')  }}">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Book Ticket</span>
            </a>
        </li>
        <li>
            <a href="{{ route('feedback')  }}">
                <i class='bx bxs-message-square-edit' ></i>
                <span class="text">Feedback</span>
            </a>
        </li>
        {{-- <li>
            <a href="{{ route('booking')  }}">
                <i class='bx bxs-bus' ></i>
                <span class="text">Tourist Spot</span>
            </a>
        </li> --}}
        {{-- <li>
            <a href="{{ route('booking')  }}">
                <i class='bx bxs-time' ></i>
                <span class="text">history</span>
            </a>
        </li> --}}
    </ul>
</ul>
    <ul class="side-menu">
        {{-- <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li> --}}
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>

        </li>
    </ul>
</section>
