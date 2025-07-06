<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        // return $user;
        return view('user.profile.index', [
            'user' => $user,
            'categories' => Category::get()
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        // return request();
        $rules= [
            'name' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];

        $validatedData = $request->validate($rules);
        // Cek apakah ada file photo di-request
        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            if ($user->photo) {
                Storage::delete('public/profile_pictures/' . $user->photo);
            }

            $file = $request->file('photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke storage/app/public/profile_pictures
            $file->storeAs('public/profile_pictures', $filename);

            // Simpan nama file ke database
            $validatedData['photo'] = $filename;
        }
        User::where('id', $user->id)->update($validatedData);

        return redirect()->route('profile', ['user' => $user->id])->with('success', 'Profile has been updated!');
    }
}
