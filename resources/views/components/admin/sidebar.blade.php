<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="ti-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.moderators')}}">
                    <i class="ti-settings menu-icon"></i>
                    <span class="menu-title">Moderators</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.users')}}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.categories')}}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.products')}}">
                <i class="ti-harddrives menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.orders')}}">
                <i class="ti-shopping-cart-full menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
    </ul>
</nav>
