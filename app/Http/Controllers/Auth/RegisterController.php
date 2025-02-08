<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'UserID' => [
                'required',
                'string',
                'max:20',
                Rule::unique(\App\Models\User::class, 'UserID'),
            ],
            'password' => 'required|string|confirmed|min:6|max:255',
            'UserEmail' => 'nullable|email|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Prepare data for insertion
        $data = [
            'UserID' => $request->UserID,
            'UserName' => $request->UserID, // Same as UserID
            'UserPass' => $request->password, // Hashed password
            'UserPass2' => $request->password, // Hashed password
            'UserType' => 1, // Default value
            'UserLoginState' => 0,
            'UserBlock' => 0,
            'UserBlockDate' => now(),
            'ChaRemain' => 0,
            'ChaTestRemain' => 0,
            'PremiumDate' => now(),
            'ChatBlockDate' => now(),
            'CreateDate' => now(),
            'LastLoginDate' => now(),
            'Upass' => Hash::make($request->password), // Hashed password
            // Optional fields
            'UserEmail' => $request->UserEmail ?? null,
            'UserAvailable' => 0,
            'SGNum' => 0,
            'SvrNum' => 0,
            'ChaName' => null,
            'UserPoint' => 0,
            'IpSite' => $request->ip(),
            'Donated' => null,
        ];

        // Create new user
        $user = User::create($data);

		// Send email verification notification
		$user->sendEmailVerificationNotification();

		// Don't log the user in immediately
		// Auth::login($user);

		// Redirect to the verification notice
		return redirect()->route('verification.notice');
    }
}
