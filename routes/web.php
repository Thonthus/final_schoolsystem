<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckedDataController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/dashboardAdmin');
        } elseif ($user->role === 'student') {
            return redirect('/dashboard');
        }
    }

    return view('welcome');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboardAdmin', function () {
        return view('/adminDashboard');
    })->name('adminDashboard');
    //scanIn
    Route::get('/scanIn', [CheckedDataController::class, 'scaninview']);
    Route::post('/scanIninsert', [CheckedDataController::class, 'scanIninsert']);
    //scanOut
    Route::get('/scanOut', [CheckedDataController::class, 'scanoutview']);
    Route::post('/scanOutinsert', [CheckedDataController::class, 'scanOutinsert']);
    //storeImage
    Route::get('/storeImage', [StudentDataController::class, 'storeimageview']);
    Route::post('/storeImage', [StudentDataController::class, 'storeimage']);
    //checkedshow
    Route::get('/checkedrecords', [CheckedDataController::class, 'checkedshow']);
    //addAdmin
    Route::get('/addadmin', [UserController::class, 'addadminview']);
    Route::post('/addadmin', [UserController::class, 'storesadmin']);
    //addStudent
    Route::get('/addstudent', [StudentDataController::class, 'addstudentview']);
    Route::post('/addstudent', [StudentDataController::class, 'storestudent']);
    //editStudent
    Route::get('/editstudent', [StudentDataController::class, 'editstudentview']);
    Route::post('/editstudent', [StudentDataController::class, 'updatestudent']);
    //studentInfoAdmin
    Route::get('/studentinfoAdmin', [StudentDataController::class, 'studentinfoadminview']);
    //checkedfind
    Route::get('/findcheckedhistory', [CheckedDataController::class, 'checkedfindhistory']);
    
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('student.dashboard');

    Route::get('/studentcheckedhistory', [CheckedDataController::class, 'studentcheckedhistory']);
});
