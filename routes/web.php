<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $users = User::all()->map(function ($user) {
        // Menambahkan URL gambar agar bisa diakses secara publik
        $user->image_url = $user->image ? asset('storage/' . $user->image) : null;
        return $user;
    });
    return Inertia::render('Home', [
        'users' => $users
    ]);
});

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user-add', [UserController::class, 'store']);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::match(['put', 'post'], '/users-update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
