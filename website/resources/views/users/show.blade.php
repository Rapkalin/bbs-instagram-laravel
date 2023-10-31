@extends('layouts.app')

@section('content')

<div class="bbs-instagram-container">
    <h1 class="bbs-instagram-header">Welcome {{ ucfirst($user->name) }}</h1>
    @if($instagramConnectUrl)
        <p>Vous ne semblez pas être connecté.</p>
        <a class="btn btn-success" href="{{ $instagramConnectUrl }}">Connecter Instagram</a>
    @else
        <p>Découvrez votre feed Instagram :</p>
        <main class="bbs-instagram-container">
            @include('components.card-grid', ['instagramPosts' => $instagramPosts])
        </main>
    @endif
</div>

@endsection
