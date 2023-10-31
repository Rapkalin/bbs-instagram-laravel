@extends('layouts.app')

@section('content')

    <div class="bbs-instagram-container">
        <h1>S'inscrire</h1>

        <div class="card bbs-box-login">
            <form action="{{ route('users.store') }}" method="post" class="vstack gap-3">

                @csrf

                <div class="form-group">
                    <label for="name">Votre identifiant Instagram</label>
                    <input type="text" class="form-control" name="name" id="name" value="">
                    @error("name")
                    {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Votre email</label>
                    <input type="email" class="form-control" name="email" id="email" value="">
                    @error("email")
                    {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" >
                    @error("password")
                    {{ $message }}
                    @enderror
                </div>

                <button class="btn btn-primary"> S'inscrire</button>

                @csrf
            </form>
        </div>

        <div>
            <p class="mt-5 bbs-alternativ-btn">Déjà inscrit ?</p>
            <a class="btn btn-success" href="{{ route('auth.login') }}">Se connecter</a>
        </div>
    </div>


@stop
