<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data user
        $users = User::all()->map(function ($user) {
            // Menambahkan URL gambar agar bisa diakses secara publik
            $user->image_url = $user->image ? asset('storage/' . $user->image) : null;
            return $user;
        });

        // Kirim data user ke Vue melalui Inertia
        return Inertia::render('User/All', [
            'users' => $users
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        try {
            // Simpan file image jika ada
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            // Simpan user
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $imagePath,
            ]);

            return to_route('user')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Jika error, kembali dengan pesan error
            return back()->withErrors(['error' => 'Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }
}
