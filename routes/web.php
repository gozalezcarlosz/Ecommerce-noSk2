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


// Solo Admin - Routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    //Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', function(){
        return view('admin.users.create')->with('title', __('Create User'));
        })->name('admin.users.create.form');
    Route::post('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');


        //Route::get('/admin/reportes', [ReportController::class, 'index']); //No implementado
    //Roles
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/admin/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::delete('/admin/roles/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::put('/admin/roles/{id}', [RoleController::class, 'edit'])->name('roles.edit');

    //Permissions
    Route::get('/admin/perms', [PermissionController::class, 'index'])->name('perms'); 
    Route::post('/admin/perms/create', [PermissionController::class, 'create'])->name('perms.create');
    Route::delete('/admin/perms/{id}', [PermissionController::class, 'delete'])->name('perms.delete');
    Route::put('/admin/perms/{id}', [PermissionController::class, 'edit'])->name('perms.edit');



    Route::get('/actualizar-roles', [ProfileController::class, 'updateRoles'])->name('update.roles');


});
