<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Support\Facades\Auth;

class InstagramAuthController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function show ()
    {
        // We check if the user is allowed to access the current feed
        $this->authorize('view', [User::class, Auth::user()->id]);
        
        $user = User::where('id', Auth::user()->id)->first(['name', 'email']);
        $profile = Profile::for($user->name);
        $instagramPosts = $profile?->feed(9);
        $freshInstagramPosts = $instagramPosts ?: $profile?->refreshFeed(9);
        $instagramConnectUrl = !$instagramPosts ? $profile?->getInstagramAuthUrl() : null;

        return view('users.show', [
            'user' => $user,
            'instagramConnectUrl' => $instagramConnectUrl,
            'instagramPosts' => $freshInstagramPosts ?: $instagramPosts
        ]);
    }
}
