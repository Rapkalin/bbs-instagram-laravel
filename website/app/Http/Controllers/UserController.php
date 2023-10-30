<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use Dymantic\InstagramFeed\Profile;

class UserController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show (int $id)
    {
        $user = User::where('id', $id)->first(['name', 'email']);
        $profile = Profile::for($user->name);
        $instagramPosts = $profile?->feed(9);
        $freshInstagramPosts = $instagramPosts ?: $profile?->refreshFeed(9);
        $instagramConnectUrl = !$profile->hasInstagramAccess() ? $profile?->getInstagramAuthUrl() : null;

        return view('users.show', [
            'user' => $user,
            'instagramConnectUrl' => $instagramConnectUrl,
            'instagramPosts' => $freshInstagramPosts ?: $instagramPosts
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create ()
    {
        return view('users.form');
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store (UserRequest $request)
    {
        $inputs = $request->validated();
        $name = strip_tags($inputs['name']);
        $email = strip_tags($inputs['email']);
        $password = Hash::make(strip_tags($inputs['password']));

        try {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();

            // We reconnect the user before the redirect so (s)he doesn't have to reconnect
            $request->session()->regenerate();
            Auth::loginUsingId($user->id);
            Profile::new($user->name);

            // Redirect the user to his feed page
            return to_route('users.show', $user->id);

        } catch (\Exception $e) {

            // We log the error
            Log::error($e->getMessage());

            // We don't give too much info to the user to avoid hacking
            return to_route('users.create')->withErrors([
                'name' => "Quelque chose s'est mal passé, veuillez réessayer"
            ]);
        }
    }

}
