@props(['search' => ''])

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{route('dashboard')}}">
            <h1 class="m-0 display-5 font-weight-semi-bold text-primary "><span class="font-weight-bold border px-3 mr-1">M</span>en's</h1>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        {{$search}}
        <form class="navbar-nav navbar-nav-right" action="{{route('logout')}}" method="POST">
            @csrf
            <div class="nav-item mr-1">
                <a class="nav-link count-indicator button btn-sm d-flex justify-content-center align-items-center"
                   href="{{route('user.update')}}">
                    Settings
                </a>
            </div>
            <input class="nav-item mr-lg-3 navbar-light btn-danger" type="submit" value="Logout">
        </form>
    </div>
</nav>
