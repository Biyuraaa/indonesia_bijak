<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.profiles.index');
        } else {
            return view('pages.profiles.index');
        }
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.profiles.edit');
        } else {
            return view('pages.profiles.edit');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('assets/images/users/' . Auth::user()->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $photo = $request->file('photo');
            $image_name = $user->name . '_' . time() . '.' . $photo->extension();
            $photo->move(public_path('assets/images/users/'), $image_name);
            $user->photo = $image_name;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profiles.index')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
