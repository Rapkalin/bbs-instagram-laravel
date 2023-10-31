@php
    use \Illuminate\Support\Facades\Auth;
@endphp
@extends('layouts.app')

@section('content')
    @guest
        <main class="bbs-landing-login bbs-instagram-container">
            <a class="btn btn-success" href="{{ route('users.create') }}">Créer un compte</a>
            <a class="btn btn-primary" href="{{ route('auth.login') }}">Se connecter</a>
        </main>
    @endguest

    @auth
        <main class="bbs-landing-login bbs-instagram-container">
            <a class="btn btn-success" href="{{ route('users.show', Auth::user()->id) }}">Aller sur mon feed Instagram</a>
        </main>
    @endauth
@endsection
