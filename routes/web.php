<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoAuthController;
use App\Http\Controllers\ProfileController;


//Auth Routes
Route::get('/login', [AuthControler::class, 'login'])->name('login');
Route::Post('/auth', [AuthControler::class, 'authenticate'])->name('auth.post');

Route::get('/register', [AuthControler::class, 'login'])->name('register');
Route::post('/register', [AuthControler::class, 'create'])->name('register.post');

Route::post('/logout', [AuthControler::class, 'logout'])->name('logout');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


//midleware Auth
Route::middleware(['auth'])->group(function () {

    Route::get('profile',[ProfileController::class,'profile'])->name('profile');
    Route::get('profile/edit',[ProfileController::class,'editProfileView'])->name('profile.edit.view');
    Route::post('profile/edit',[ProfileController::class,'editProfile'])->name('profile.edit');
    Route::post('profile/edit/password',[ProfileController::class,'editPassword'])->name('profile.edit.password');

});


//App Routes
Route::get('/', [NoAuthController::class, 'index'])->name('home');

Route::get('/dashboard', [NoAuthController::class, 'dashboard'])->name('dashboard');   


// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

    //Route::get('/admin/reportes', [ReportController::class, 'index']); //No implementado

    Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/admin/roles', [RoleController::class, 'create'])->name('roles.create');
    Route::delete('/admin/roles/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::put('/admin/roles/{id}', [RoleController::class, 'edit'])->name('roles.edit');

    Route::get('/admin/perms', [PermissionController::class, 'index'])->name('perms'); 
    Route::post('/admin/perms', [PermissionController::class, 'create'])->name('perms.create');
    Route::delete('/admin/perms/{id}', [PermissionController::class, 'delete'])->name('perms.delete');
    Route::put('/admin/perms/{id}', [PermissionController::class, 'edit'])->name('perms.edit');



    Route::get('/actualizar-roles', [ProfileController::class, 'updateRoles'])->name('update.roles');


});
