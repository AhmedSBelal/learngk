<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialStoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {
        $social = Socialite::driver($service)->user();

        $user = User::where('email', $social->getEmail())->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('home');
        }

        return view('auth.social-confirm-password', compact('social'));
    }

    public function StoreSocialUser(SocialStoreUserRequest $request)
    {
        $role = Role::query()->where('title', 'user')->pluck('id')->first();

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Carbon::now(),
        ]);

        dd('ehree');

        $user->addMediaFromUrl($request->avatar)->toMediaCollection('avatar');

        $user->roles()->sync($role);

        Auth::login($user);

        return redirect()->route('home');
    }
}
