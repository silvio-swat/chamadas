<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Livewire\LwFilas;
use App\Http\Livewire\LwLocals;
use App\Http\Livewire\LwMenu;
use App\Http\Livewire\LwParams;
use App\Http\Livewire\LwPermissions;
use App\Http\Livewire\LwRolesPermissions;
use App\Http\Livewire\LwUser;
use App\Http\Livewire\LwUsersPermissions;
use App\Http\Livewire\UserRole;
use App\Http\Livewire\WebSocketTest;
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
    // broadcast(new WebSocketDemoEvent('some data'));

    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    // $fila = Fila::create([
    //     'nome' => 'Geral',
    //     'status' => 'ATIVO',
    //     'prioridade' => 1
    // ]);

    // $local = Local::create([
    //     'nome'    => 'Mesa1',
    //     'rotulo'  => 'Mesa1',
    //     'status'  =>  'ATIVO',
    //     'fila_id' => 1
    // ]);

    // $local = Local::find(1);

    // Teste de Filaenc
    
    // $fila = Fila::create([
    //     'nome'       => 'Corredor',
    //     'status'     => 'ATIVO',
    //     'prioridade' => 1
    // ]);

    // $local->filaEncs()->attach($fila);

    // $fila = Fila::create([
    //     'nome'       => 'Sala',
    //     'status'     => 'ATIVO',
    //     'prioridade' => 1
    // ]);

    // $local->filaEncs()->attach($fila);

    // $filaEncs =$local->filaEncs;
    // // dd($filas);

    // echo "teste de fila Encs filas<br />";
    // foreach($filaEncs as $fila)
    // {
    //     echo $fila->nome . "<br />";
    // }

    // Teste de filas
    
    // $fila = Fila::create([
    //     'nome'       => 'Consultorio',
    //     'status'     => 'ATIVO',
    //     'prioridade' => 1
    // ]);
    // $local->filas()->attach($fila);

    // $fila = Fila::create([
    //     'nome'       => 'Enfermaria',
    //     'status'     => 'ATIVO',
    //     'prioridade' => 1
    // ]);
    // $local->filas()->attach($fila);

    // $filas =$local->filas;

    // echo "<br />teste de filas<br />";
    // foreach($filas as $fila)
    // {
    //     echo $fila->nome . "<br />";
    // }

    // $filaEnc = Fila::find(4);
    // $filaEnc->localEncs()->create([
    //     'nome'    => 'Mesa2',
    //     'rotulo'  => 'Mesa2',
    //     'status'  =>  'ATIVO',
    //     'fila_id' => 1
    // ]);
    // dd($filaEnc->localEncs);

    Route::get('/dashboard'        , [DashboardController::class,'index'])->name('dashboard');
    Route::get('/user-roles'       , UserRole::class);
    Route::get('/users'            , LwUser::class);
    Route::get('/menus'            , LwMenu::class);
    Route::get('/params'           , LwParams::class);    
    Route::get('/permissions'      , LwPermissions::class);    
    Route::get('/roles-permissions', LwRolesPermissions::class);    
    Route::get('/users-permissions', LwUsersPermissions::class); 
    Route::get('/filas'            , LwFilas::class); 
    Route::get('/locals'           , LwLocals::class); 
    Route::get('/web-socket-test'  , WebSocketTest::class); 

    Route::post('/autocomplete/user', [AutocompleteController::class, 'user'])->name('user-autocomplete');   
    Route::post('/autocomplete/permission', [AutocompleteController::class, 'permission'])->name('permission-autocomplete');   
});

require __DIR__.'/auth.php';
