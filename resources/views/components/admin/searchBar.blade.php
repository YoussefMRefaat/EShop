@props(['action' => '' , 'taxonomy' => ''])

<ul class="navbar-nav mr-lg-2">
    <li class="nav-item nav-search d-none d-lg-block">
        <form class="input-group" method="get" action="{{$action}}">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <button type="submit" class="border-0 btn-icon ti-search"></button>
            </div>
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search in {{$taxonomy}}"
                   aria-label="search" aria-describedby="search" name="search">
        </form>
    </li>
</ul>
