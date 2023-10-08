<?php

use App\Http\Controllers\Controller;
use App\Models\User;
use Hamcrest\Type\IsString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isEmpty;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/dbcheck', function (Request $request) {
    if(DB::connection()->getPdo()) 
            { 
                echo "Successfully connected to the database => " 
                             .DB::connection()->getDatabaseName(); 
            } 

});

Route::get('/getusers', function () {
      $users = DB::table('users')->get();
      return $users;
      //return view('userdisplay', ['users' => $users]);
      //return redirect()->view('userdisplay', ['users' => $users]);

});

Route::post('/searchusers', function (Request $request) {
    $users = User::where('name', 'LIKE', '%'.$request->param.'%')
    ->orWhere('city', 'LIKE', '%'.$request->param.'%')
    ->get();
    return $users;
});

