@php
    use \Illuminate\Support\Facades\Auth;
@endphp
<div class="navbar navbar-expand-sm navbar-light navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="https://scontent-cdg4-2.xx.fbcdn.net/v/t39.30808-6/300427669_759962798670689_7564563675694383001_n.png?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=1ExI0GWRe5IAX8K64Lp&_nc_ht=scontent-cdg4-2.xx&oh=00_AfAvMfhBct8-lHsJXtnJpOMID6ZVkrZypkAsl0ErV3tM2Q&oe=6543A9DB" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="{{ route('users.show', Auth::user()->id) }}">{{ ucfirst(Auth::user()->name )}}</a>
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>
                    @endguest
                </li>
                <li class="nav-item dropdown">
                    <img class="avatar dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="https://kitt.lewagon.com/placeholder/users/ssaunier" />
                    @auth
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="nav-link">Se déconnecter</button>
                                </form>
                        </div>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</div>
