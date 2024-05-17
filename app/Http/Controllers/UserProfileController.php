<?php

// app/Http/Controllers/UserProfileController.php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    public function index()
    {
        $profiles = UserProfile::all();
        return view('profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_profiles',
            'asal' => 'nullable',
        ]);

        $user_id = Auth::id(); // Mendapatkan id pengguna yang sedang login
        $data = $request->all();
        $data['user_id'] = $user_id;

        UserProfile::create($data);

        return redirect()->route('profile.index')
            ->with('success', 'Profile Pengguna berhasil ditambahkan');
    }

    public function show(UserProfile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    public function edit(UserProfile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, UserProfile $profile)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user_profiles,email,' . $profile->id,
            'asal' => 'nullable',
        ]);

        $profile->update($request->all());

        return redirect()->route('profile.index')
            ->with('success', 'Profile Pengguna berhasil diperbarui');
    }

    public function destroy(UserProfile $profile)
    {
        $profile->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Profile Pengguna berhasil dihapus');
    }
}
