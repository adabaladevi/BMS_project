<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WebpageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
//Website Routes
Route::get('/',[WebpageController::class,'landing'])->name('webpage.view');
Route::get('page/{name}',[WebpageController::class,'viewPage'])->name('webpage.dynamic');

//Authorizatio Routes
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate'])->name('login.authenticate');
Route::get('signup',[AuthController::class,'signup'])->name('signup');
Route::post('signup',[AuthController::class,'createUser'])->name('signup.createUser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes for Admin and Users
Route::middleware(['auth'])->group(function(){
  //Dashbord Routes for Admin
  Route::get('dashboard/admin',[UserController::class,'adminDashboard'])->name('dashboard.admin');
  //Dashboard Routes for User
 
  Route::get('dashboard/user',[UserController::class,'userDashboard'])->name('dashboard.user');

  //Booking Related Routes
  Route::get('booking/all',[BookingController::class,'index'])->name('booking.all');
  Route::get('booking/my',[BookingController::class,'userBookings'])->name('booking.my');
  Route::get('booking/add',[BookingController::class,'add'])->name('booking.add');
  Route::post('booking/save',[BookingController::class,'save'])->name('booking.save');
  Route::get('booking/{id}',[BookingController::class,'getBookingsById'])->name('booking.edit');
  Route::post('booking/{id}',[BookingController::class,'updateBookingsById'])->name('booking.update');
  Route::get('booking/delete/{id}',[BookingController::class,'viewDelete'])->name('booking.view.delete');
  Route::post('booking/delete/{id}',[BookingController::class,'delete'])->name('booking.delete');

  //Webpage Related Routes
  
  Route::get('Webpage',[WebpageController::class,'index'])->name('Webpage.index');
  Route::get('Webpage/add',[WebpageController::class,'add'])->name('Webpage.add');
  Route::post('Webpage/save',[WebpageController::class,'save'])->name('Webpage.save');
  Route::get('Webpage/{id}',[WebpageController::class,'edit'])->name('Webpage.edit');
  Route::post('Webpage/{id}',[WebpageController::class,'update'])->name('Webpage.update');
  Route::get('Webpage/delete/{id}',[WebpageController::class,'viewDelete'])->name('Webpage.view.delete');
  Route::post('Webpage/delete/{id}',[WebpageController::class,'delete'])->name('Webpage.delete');

  //User Related Routes
  
  Route::get('User',[UserController::class,'index'])->name('User');
  Route::get('User/add',[UserController::class,'add'])->name('User.add');
  Route::post('User/save',[UserController::class,'save'])->name('User.save');
  Route::get('User/{id}',[UserController::class,'edit'])->name('User.edit');
  Route::post('User/{id}',[UserController::class,'update'])->name('User.update');
  Route::get('User/delete/{id}',[UserController::class,'viewDelete'])->name('User.view.delete');
  Route::post('User/delete/{id}',[UserController::class,'delete'])->name('User.delete');


  // User Profile Related Routes
  Route::get('profile',[UserController::class,'getProfile'])->name('User.profile.get');
  Route::post('profile',[UserController::class,'saveProfile'])->name('User.profile.save');
});