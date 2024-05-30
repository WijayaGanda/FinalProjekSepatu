@php
    $currentRouteName = Route::currentRouteName();
@endphp
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
    </nav>
