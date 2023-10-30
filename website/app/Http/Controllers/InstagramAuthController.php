<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Support\Facades\Auth;

class InstagramAuthController extends Controller
{
    public function show ()
    {

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
