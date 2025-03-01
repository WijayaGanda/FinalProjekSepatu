@php
    $currentRouteName = Route::currentRouteName();
@endphp


<style>
    nav{
        background-color: #664d78;
    }
    .navbar-brand{
        color: #ffffff;
    }
    .navbar-nav a{
        color: #ffffff;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-box-seam"></i> SB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link  @if ($currentRouteName == 'home') active @endif" aria-current="page"
                    href="{{ route('home') }}">Home</a>
                <a class="nav-link  @if ($currentRouteName == 'sales.index') active @endif" aria-current="page"
                    href="{{ route('sales.index') }}">Penjualan</a>
                <a class="nav-link  @if ($currentRouteName == 'barangs.index') active @endif" aria-current="page"
                    href="{{ route('barangs.index') }}">List</a>

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
