<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerSupportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\userloginController;
use App\Http\Controllers\Auth\userregisterController;
use App\Http\Controllers\DashboardController;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Journey;

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/user-page', 'userloginController@index')->name('user.index');
});

Route::get('/user/main/journey/{id}/form', [BookingController::class, 'showForm'])->name('show.form');
Route::post('/user/main/journey/{id}/form', [BookingController::class, 'submitForm'])->name('submit.post');
// Route::post('/user/main/{id}/submit', [BookingController::class, 'submit'])->name('submit.post');
Route::get('/admin/main/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');



Route::get('/journeys', [JourneyController::class, 'index'])->name('journeys.index');
Route::get('/journeys/create', [JourneyController::class, 'create'])->name('journeys.create');
Route::post('/journeys', [JourneyController::class, 'store'])->name('journeys.store');
Route::get('/journeys/{journey}', [JourneyController::class, 'show'])->name('journeys.show');
Route::get('/journeys/{journey}/edit', [JourneyController::class, 'edit'])->name('journeys.edit');
Route::put('/journeys/{journey}', [JourneyController::class, 'update'])->name('journeys.update');
Route::delete('/journeys/{journey}', [JourneyController::class, 'destroy'])->name('journeys.destroy');

Route::resource('bookings', BookingController::class);
Route::resource('customer-supports', CustomerSupportController::class);
Route::resource('feedbacks', FeedbackController::class);

Route::get('/admin', function () {})->middleware('auth')->where('role', 'admin');
Route::get('/', function () {return view('admin.login');});
// Route::get('user/userlogin', [Controller::class, 'Login']);
Route::get('admin/login', [Controller::class, 'showLogin']);
Route::get('admin/main/dashboard', [Controller::class, 'showDashboard']);


//admin
Route::get('/admin/main/schedule', [BookingController::class, 'schedule'])->name('schedule');
Route::get('/admin/main/booking',  [BookingController::class, 'index'])->name('admin.main.booking');
Route::get('/admin/main/ticket', [BookingController::class, 'index'])->name('ticket.index');
Route::post('/admin/accept-ticket/{id}', [JourneyController::class, 'acceptTicket'])->name('admin.accept-ticket');
Route::get('/admin/main/dashboard/dashboard', [BookingController::class, 'dashboard'])->name('admin.main.dashboard.dashboard');
Route::get('admin/api/total-passengers', 'Admin\DashboardController@getTotalPassengers');
Route::get('/admin/booking/booking', [BookingController::class, 'acceptTicket'])->name('admin.main.schedule');
Route::get('/admin/main/booking/schedule', [JourneyController::class, 'scheduled'])->name('admin.main.booking.schedule');
Route::get('/admin/main/booking/schedule', [BookingController::class, 'scheduled'])->name('tickets');
Route::get('/admin/main/booking/schedule', [BookingController::class, 'scheduled'])->name('ticket.scheduled');
Route::get('/admin/main/booking/schedule', [BookingController::class, 'scheduled'])->name('schedule.schedule');
Route::get('/admin/main/dashoard', [BookingController::class, 'getUserData'])->name('getUserData');



//user
Route::get('/user/userlogin', [JourneyController::class, 'login'])->name('userlogin');
Route::get('/user/main/journey/{id}/editbooking', [JourneyController::class, 'show'])->name('journey.show');
Route::put('/user/main/journey/{id}/editbooking', [JourneyController::class, 'update'])->name('journey.update');
Route::get('/user/main/journey/{id}/form', [JourneyController::class, 'forms'])->name('form.forms');
Route::post('/user/main/booking/{id}/status',  [BookingController::class, 'status'])->name('status.post');
Route::get('form/{journey_id}', 'FormController@show')->name('form.show');
Route::get('/user/main/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/user/main/booking',  [BookingController::class, 'pages'])->name('booking');
Route::get('/user/main/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/user/main/journey', [JourneyController::class, 'journey'])->name('journey.post');
Route::get('/user/main/journey', [JourneyController::class, 'index'])->name('journey.index');
Route::get('/user/main/dashboard', [BookingController::class, 'recentBookings'])->name('dashboard');


Route::get('/admin/main/comment', [FeedbackController::class, 'comment'])->name('comment');


Route::get('/user/main/feedback', [FeedbackController::class, 'feedback'])->name('feedback');
Route::post('/user/main/feedback', [FeedbackController::class, 'rating'])->name('feedback.rating');
Route::post('/user/main/feedback/rating',  [FeedbackController::class, 'ratingpost'])->name('feedback.post');


// Route for showing the register form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'registerPost'])->name('register.post');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/user/profile/{user}', 'UserController@profile')->name('user.profile');

// Route for showing the register form for user
Route::post('/user/userregisterPost', [userregisterController::class, 'userregisterPost'])->name('userregister.post');
Route::get('/user/userregisterPost', [userregisterController::class, 'userregisterPost'])->name('userregister');
Route::get('/user/userregister', [JourneyController::class, 'userlogin'])->name('userregister');
Route::get('/userlogin', [userloginController::class, 'userregisterPost'])->name('userlogin');
Route::post('/userlogin', [userloginController::class, 'userlogin'])->name('userlogin.post');
