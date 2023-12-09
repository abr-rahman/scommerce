<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'password' => ['required', Password::defaults(), 'confirmed', 'min:8'],
        ]);
        
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $after_link = explode('/', url()->previous());
        if(end($after_link) == "profile"){
            return back()->with('success', 'password-updated successfully!');
        }
        return response()->json('password-updated successfully!');
    }
}
