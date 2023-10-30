
<div class="cards">
    @foreach($instagramPosts as $instagramPost)
        @include('components.card', ['instagramPost' => $instagramPost])
    @endforeach
</div>
