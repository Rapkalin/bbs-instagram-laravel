@extends('layouts.app')

@section('content')

    <main class="bbs-instagram-container">
        @include('components.card-grid')
        <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
        </div>
    </main>


@stop
