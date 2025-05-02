<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('User/user-edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // pengecualian untuk email yang sedang diupdate
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada gambar yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image && file_exists(storage_path('app/public/' . $user->image))) {
                unlink(storage_path('app/public/' . $user->image));
            }

            // Upload gambar baru
            $gambarPath = $request->file('image')->store('images', 'public');
            $user->image = $gambarPath;
        }

        // Update nama dan email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Simpan perubahan
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('user')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('user')->with('success', 'User updated successfully!');
    }
}
