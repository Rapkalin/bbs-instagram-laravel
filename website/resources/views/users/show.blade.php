@extends('layouts.app')

@section('content')

<div class="bbs-instagram-header">
    <h1>Welcome {{ $user->name }}</h1>
    @if($instagramConnectUrl)
        <p>Vous ne semblez pas être connecté.</p>
        <a href="{{ $instagramConnectUrl }}">Connecter Instagram</a>
    @else
        <p>Découvrez votre feed Instagram :</p>
    @endif
</div>

<main class="bbs-instagram-container">
    @include('components.card-grid', ['instagramPosts' => $instagramPosts])
    <div
        class="fb-like"
        data-share="true"
        data-width="450"
        data-show-faces="true">
    </div>
</main>

@endsection
