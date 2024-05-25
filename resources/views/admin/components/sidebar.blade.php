<div class="sidebar">
        <div class="sidebar-container">
            <div class="brand">
                <h2>
                    <span class="lab la-staylinked"></span>
                    Zam-Olo Explore
                </h2>
            </div>
            <div class="sidebar-avartar">
                <div>
                <img src="{{ asset('images/cat.jpg') }}" alt="Cat Image">
                </div>
                <div class="avartar-info">
                    <div class="avartar-text">
                        <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4> <!-- Display the user's name -->
                    </div>
                    <span class="las la-angle-double-down"></span>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ route('admin.main.dashboard.dashboard')  }}">
                            <span class="las la-adjust"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.main.booking')  }}">
                            <span class="la la-book"></span>
                            <span>Booking/processing</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('schedule')  }}">
                            <span class="la la-book"></span>
                            <span>Booking/schduled</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="">
                            <span class="las la-chart-bar"></span>
                            <span>Analytics</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="">
                            <span class="las la-calendar"></span>
                            <span>Users/Employers</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="">
                            <span class="las la-user"></span>
                            <span>Account</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('comment')  }}">
                            <span class="las la-comments"></span> <!-- Change this line -->
                            <span>Feedbacks</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-menu-footer">
                <a href="#" class="btn btn-main btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="las la-sign-out-alt"></span>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            {{-- <div class="sidebar-card">
                <div class="side-card-icon">
                    <span class="lab la-codiepie"></span>
                </div>
                <div> --}}
                    {{-- <h4>Make adsense</h4>
                    <p>Add ads to your vidoes to eran money</p> --}}
                    {{-- <h4>TRAVEL</h4>
                    <p>N/A</p>
                </div>
               <button class="btn btn-main btn-block">Create now</button>
            </div> --}}
        </div>
    </div>
