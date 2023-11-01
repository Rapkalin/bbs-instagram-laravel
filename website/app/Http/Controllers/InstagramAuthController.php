<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class InstagramAuthController extends Controller
{

    protected UserController $userController;

    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function show ()
    {
        // We check if the user is allowed to access the current feed
        $this->authorize('view', [User::class, Auth::user()->id]);

        $user = User::where('id', Auth::user()->id)->first(['name', 'email']);
        $profile = Profile::for($user->name);

        // We retrieve the feed and if it already exists we refresh it
        $instagramPosts = $this->userController->get_instagram_feed($profile);

        // We check if the user is connected to Instagram and if not we display a button for connexion
        $instagramConnectUrl = !$profile->hasInstagramAccess() ? $profile->getInstagramAuthUrl() : null;

        return view('users.show', [
            'user' => $user,
            'instagramConnectUrl' => $instagramConnectUrl,
            'instagramPosts' => $instagramPosts
        ]);
    }
}
