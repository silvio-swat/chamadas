<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Livewire\LwMenu;
use App\Http\Livewire\LwParams;
use App\Http\Livewire\LwPermissions;
use App\Http\Livewire\LwRolesPermissions;
use App\Http\Livewire\LwUser;
use App\Http\Livewire\LwUsersPermissions;
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
    Route::get('/permissions', LwPermissions::class);    
    Route::get('/roles-permissions', LwRolesPermissions::class);    
    Route::get('/users-permissions', LwUsersPermissions::class); 

    Route::post('/autocomplete/user', [AutocompleteController::class, 'user'])->name('user-autocomplete');   
    Route::post('/autocomplete/permission', [AutocompleteController::class, 'permission'])->name('permission-autocomplete');   
});

require __DIR__.'/auth.php';
