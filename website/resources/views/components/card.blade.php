@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="image-container">
    <img
        class="card-category"
        src="{{ $instagramPost->url }}"
        id="imageModalTrigger-{{ $instagramPost->id }}"
        data-toggle="modal"
        data-target="#imageModal"
    >
<a class="after" href="{{ route('users.post', ['userId' => Auth::user()->id, 'postId' => $instagramPost->id]) }}">Voir le post</a>
</div>
