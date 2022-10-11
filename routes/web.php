<?php

use App\Jobs\ExampleJob;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('test-job', function() {
    ExampleJob::dispatch(['example' => 'value']);

    return 'ok';
});

Route::get('test-email', function () {
    Mail::to('voce@email.com')->send(new TestMail());

    return 'ok - mail sended';
});

// Route::get('create-users-with-images', function () {
//     foreach (range(1,5) as $value ) {
//         User::factory()->create([
//             'image' =>  "users/Arte {$value}.png"
//         ]);
//     }

//     return User::get();
// });

Route::get('/', function () {
    return view('welcome');
});
