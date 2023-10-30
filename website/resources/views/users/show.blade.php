@extends('layouts.app')

@section('content')

<div class="bbs-instagram-header">
    <h1>Welcome {{ $user->name }}</h1>
    <p>Here is your Instagram feed:</p>
</div>

<main class="bbs-instagram-container">
    @include('components.card-grid')
    <div
        class="fb-like"
        data-share="true"
        data-width="450"
        data-show-faces="true">
    </div>
</main>

@endsection
