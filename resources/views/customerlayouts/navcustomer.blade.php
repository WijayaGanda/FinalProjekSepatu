@php
    $currentRouteName = Route::currentRouteName();
@endphp


<style>
    nav {
        background-color: #664d78;
    }

    .navbar-brand {
        color: #ffffff;
    }

    .navbar-nav a {
        color: #ffffff;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('pelanggan.homecustomer') }}"><i class="bi bi-box-seam"></i>
            @auth
                Halo, {{ Auth::user()->name }}
            @else
                SB
            @endauth
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link  @if ($currentRouteName == 'home') active @endif" aria-current="page"
                    href="{{ route('pelanggan.homecustomer') }}">Home</a>
                <a class="nav-link  @if ($currentRouteName == 'sales.index') active @endif" aria-current="page"
                    href="{{ route('customersales.index') }}">History</a>
                <a class="nav-link" href="{{ route('cart.index') }}">
                    <i class="bi bi-cart"></i>
                    Keranjang
                    @if (session('cart') && count(session('cart')) > 0)
                        <span class="badge bg-danger">{{ count(session('cart')) }}</span>
                    @endif
                </a>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
