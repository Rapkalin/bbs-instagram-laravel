<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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
        // We check if the user is allowed to access the current feed
        $this->authorize('view', [User::class, $id]);

        // We retrieve user infos
        $user = User::where('id', $id)->first(['name', 'email']); // Could have been in model
        $profile = Profile::for($user->name);

        // If the Instagram token is older than 15 days we refresh it
        $dateNow = Carbon::now();
        $lastTokenUpdate = $profile?->latestToken()?->updated_at;
        if($lastTokenUpdate && $lastTokenUpdate->diff($dateNow)->format('%a') > 15) {
            $profile->refreshToken();
        }

        // We retrieve the feed and if it already exists we refresh it
        $instagramPosts = $profile?->feed(9);
        $freshInstagramPosts = $instagramPosts ?: $profile?->refreshFeed(9);

        // We check if the user is connected to Instagram and if not we display a button for connexion
        $instagramConnectUrl = !$profile->hasInstagramAccess() ? $profile->getInstagramAuthUrl() : null;

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

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function post (int $userId, int $postId)
    {
        // We check if the user is allowed to access the current post
        $this->authorize('view', [User::class, $userId]);

        // We retrieve user infos
        $user = User::where('id', $userId)->first(['name', 'email']); // Could have been in model
        $profile = Profile::for($user->name);

        // We retrieve the feed and if it already exists we refresh it
        $instagramPosts = $profile?->feed(9);
        $freshInstagramPosts = $instagramPosts ?: $profile?->refreshFeed(9);
        $instagramPost = $freshInstagramPosts->collect()->where('id', $postId)->first();

        return view('users.post', [
            'instagramPost' => $instagramPost
        ]);
    }

}
