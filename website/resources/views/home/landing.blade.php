@php
    use Illuminate\Support\Facades\Route as Route;
@endphp
@extends('layouts.app')

@section('content')

    <main class="bbs-instagram-login">
        {{--<a href="{{ $instagram_auth_url }}">Click to get Instgram permission</a>--}}
        <a href="{{ route('users.create') }}">Créer un compte</a>
        <a href="{{ route('auth.login') }}">Se connecter</a>
    </main>

@stop
