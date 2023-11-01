@extends('layouts.app')

@section('content')
    <div class="bbs-instagram-post-container">
        <img class="bbs-instagram-image"
             src="{{ $instagramPost->url }}"
             alt="{{ $instagramPost->id }}">
        <p class="bbs-instagram-caption">{!! nl2br($instagramPost->caption)  !!}</p>
        <a href="{{$instagramPost->permalink }}" class="btn btn-primary">Voir le post sur Instagram</a>
    </div>
@endsection
