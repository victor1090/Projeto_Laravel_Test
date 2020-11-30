<?php

use App\Http\Controllers\Form\TesteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

/*Route::group(['namespace' => ''], function(){
    Route::get('usuarios',[UserController::class, 'listAllUsers'])->name('users.listAll');

    Route::get('usuarios/add',[UserController::class, 'FormAddUser'])->name('users.FormAddUser');
    Route::get('usuarios/editar/{user}',[UserController::class, 'FormEditUser'])->name('users.FormEditUser');
    Route::get('usuarios/{user}',[UserController::class, 'listUser'])->name('users.listUser');

    Route::post('usuarios/newUser',[UserController::class, 'newUser'])->name('users.newUser');


    Route::put('usuarios/edit/{user}',[UserController::class, 'edit'])->name('user.edit');


    Route::delete('usuarios/destroy/{user}',[UserController::class, 'delete'])->name('user.destroy');

});

*/

Route::resource('usuarios', TesteController::class)->names('user')->parameters(['usuarios' => 'user']);
