@php
    $currentRouteName = Route::currentRouteName();
@endphp


<nav class="navbar navbar-expand-lg" style="background-color: rgb(220, 220, 220)">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homes.index') }}"><i class="bi bi-box-seam"></i> SB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link  @if ($currentRouteName == 'home') active @endif" aria-current="page"
                    href="{{ route('homes.index') }}">Home</a>
                <a class="nav-link  @if ($currentRouteName == 'sales.index') active @endif" aria-current="page"
                    href="{{ route('sales.index') }}">Penjualan</a>
                <a class="nav-link  @if ($currentRouteName == 'barangs.index') active @endif" aria-current="page"
                    href="{{ route('barangs.index') }}">List</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf   
                </form>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>
