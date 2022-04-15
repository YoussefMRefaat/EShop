<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{route('home')}}" class="nav-item nav-link @if(request()->route()->getName() == 'home') active @endif">Home</a>
                <a href="{{route('shop')}}" class="nav-item nav-link @if(request()->is('shop*')) active @endif">Shop</a>
            </div>
            @auth
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{route('user.update')}}" class="nav-item nav-link @if(request()->is('setting*')) active @endif">Settings</a>
                    <form class="nav-item nav-link" method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-outline-danger btn-sm" type="submit">Logout</button>
                    </form>
                </div>
            @endauth
            @guest
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{route('login')}}" class="nav-item nav-link @if(request()->is('login*')) active @endif">Login</a>
                    <a href="{{route('register')}}" class="nav-item nav-link @if(request()->is('register*')) active @endif">Register</a>
                </div>
            @endguest
        </div>
    </nav>
</div>
