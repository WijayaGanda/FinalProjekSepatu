@php
    $currentRouteName = Route::currentRouteName();
@endphp

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="bi bi-box-seam"></i> SB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-link  @if ($currentRouteName == 'home') active @endif" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" aria-current="page"
                        href="/login">Login</a>
                    <a class="nav-link  @if ($currentRouteName == 'barangs.index') active @endif" aria-current="page"
                        href="{{route('barangs.index')}}">List</a>
                    <a class="nav-link" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</div>

    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link"  @if ($currentRouteName == 'home') active @endif aria-current="page" href="{{route('home')}}">Home</a>
                    <a class="nav-link" href="#">Login</a>
                    <a class="nav-link"  @if ($currentRouteName == 'barangs.index') active @endif href="{{route('barangs.index')}}">List</a>
                    <a class="nav-link" href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav> --}}
