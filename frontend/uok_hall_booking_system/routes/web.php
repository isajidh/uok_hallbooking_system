<?php

use App\Models\Users;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', function () {
    // Create a new user
    $user = new Users();
    $user->user_name = 'John Doesdfsaz';
    $user->email = 'john@examplseadsa.com';
    $user->password = bcrypt('secret');
    $user->authorised_by = 'Admin';
    $user->university_email = 'john@universitya.com';
    $user->contact_number = '1234567890';
    $user->academic_year = '2024';
    $user->save();

    return 'User created successfully!';
});

Route::get('/test-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Connected successfully to the database.";
    } catch (\Exception $e) {
        return "Could not connect to the database: " . $e->getMessage();
    }
});
