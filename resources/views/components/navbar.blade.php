<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route(Auth::user() ? 'dashboard' : 'welcome')}}">
            <img src="{{asset('assets/images/logo.png')}}" alt="Logo" width="150" height="67" class="d-inline-block align-top" style="border-radius: 10px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Auth::check())
                    <a class="nav-link" href="{{route('dashboard')}}">Home</a>
                    @else
                    <a class="nav-link" href="{{route('welcome')}}">Home</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('parties.index')}}">Partai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('candidates.index')}}">Kandidat</a>
                </li>
                @if (Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('votes.index')}}">Voting</a>
                </li>
                @endif
                <li class="nav-item">
                    @if (Auth::check())
                    <a class="nav-link" href="{{route('logout')}}">
                        <button type="button" class="btn btn-primary">Logout</button>
                    </a>
                    @else
                    <a class="nav-link" href="{{route('login')}}">
                        <button type="button" class="btn btn-primary">Login</button>
                    </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
