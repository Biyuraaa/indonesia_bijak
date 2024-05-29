<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        return view('dashboard.profiles.index');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('dashboard.profiles.edit');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $request->user()->name . '.' . $photo->getClientOriginalExtension();

            // Delete old photo if it exists
            if ($request->user()->photo) {
                $oldPhotoPath = public_path('images/' . $request->user()->photo);
                if (file_exists($oldPhotoPath)) {
                    @unlink($oldPhotoPath);
                }
            }

            // Move the new photo to the public/images directory
            $photo->move(public_path('images'), $filename);

            // Update the photo in the database
            $request->user()->photo = $filename;
            $request->user()->save();
        }

        // Fill the user model with validated data
        $request->user()->fill($request->validated());

        // Check if email has changed
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Save the updated user model
        $request->user()->save();

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
