<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\LwMenu;
use App\Http\Livewire\LwParams;
use App\Http\Livewire\LwUser;
use App\Http\Livewire\UserRole;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard'  , [DashboardController::class,'index'])->name('dashboard');
    Route::get('/user-roles' , UserRole::class);
    Route::get('/users'      , LwUser::class);
    Route::get('/menus'      , LwMenu::class);
    Route::get('/params'     , LwParams::class);    
});

require __DIR__.'/auth.php';
