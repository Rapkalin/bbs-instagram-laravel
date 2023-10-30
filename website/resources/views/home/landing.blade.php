@extends('layouts.app')

@section('content')

    <main class="bbs-instagram-login">
        <a href="{{ route('users.create') }}">Créer un compte</a>
        <a href="{{ route('auth.login') }}">Se connecter</a>
    </main>
@endsection
