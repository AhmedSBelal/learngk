<?php

namespace App\Http\Controllers\Pages;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilePageController extends Controller
{
    protected User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user->query()->where('email', auth()->user()->email)->with('media')->first();
        return view('auth.profile-page', compact('user'));
    }

    public function updateProfile(UserProfileUpdateRequest $request)
    {
        $user = $this->user->where('email', auth()->user()->email)->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('avatar')) {

            // Check if the user has an existing avatar in the media collection
            if ($user->hasMedia('avatar')) {
                $user->clearMediaCollection('avatar'); // Clear the entire avatar collection
            }
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');

            // $user->avatar->delete();
            // $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');

        }

        Alert::Success('Success', 'Your profile changed Successfully')
            ->timerProgressBar();

        return back();
    }

    public function changePassword(UserChangePasswordRequest $request)
    {
        $user = $this->user->where('email', auth()->user()->email)->first();

        if (!Hash::check($request->old_password, $user->password)) {
            Alert::warning('Warning', 'Please check your entries')
                ->timerProgressBar();
            return back();
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Alert::success('Success', 'Password Changed Successfully')
            ->timerProgressBar();

        \Auth::logout();

        return redirect()->route('login');
    }
}
