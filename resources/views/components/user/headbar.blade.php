<div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
        <a href="{{ route('home') }}" class="text-decoration-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">M</span>en's</h1>
        </a>
    </div>
    <div class="col-lg-6 col-6 text-left">
        <form action="{{route('shop.search')}}" method="GET">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for products" name="product">
                <div class="input-group-append">
                    <button type="submit" class="border-0">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @auth
        <div class="col-lg-3 col-6 text-right">
            <a href="{{route('favourites')}}" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">{{auth()->user()->loadCount('favourites')->favourites_count}}</span>
            </a>
            <a href="{{route('cart')}}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{auth()->user()->load('cart.products')->cart->products->count()}}</span>
            </a>
        </div>
    @endauth
</div>
