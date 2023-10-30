@extends('layouts.app')

@section('content')
    <h1>Se connecter</h1>

    <div class="card">
        <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">

            @csrf

            <div class="form-group">
                <label for="name">Votre identifiant Instagram</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error("name")
                {{ $message }}
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Votre email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
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

           <button class="btn btn-primary"> Se connecter </button>
        </form>
    </div>
@endsection
