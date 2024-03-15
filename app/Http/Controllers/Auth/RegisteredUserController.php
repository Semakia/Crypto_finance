<?php

namespace App\Http\Controllers\Auth;

use App\Mail\VerificationEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegisteredUserRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = Country::all()->pluck('country_name', 'id')->toArray();
        return view('auth.register', compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CreateRegisteredUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'tos_accepted_at' => now(),
            'contact' => $request->contact,
            'country_id' => $request->country_id,
            
        ]);
        if($request->filled('username')) {

            $user->save();
        }
        $user->assignRole('user');
        event(new Registered($user));

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        Mail::to($user->email)->send(new VerificationEmail($verificationUrl));

        Flash::success('You have registered successfully, Activate your account from mail.');

        return redirect(route('login'));
    }
}
