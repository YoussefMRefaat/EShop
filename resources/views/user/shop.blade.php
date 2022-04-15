<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Shop"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-3 col-md-12">
                    <form action="{{route('shop.filter')}}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="border-bottom mb-4 pb-4">
                            <h5 class="font-weight-semi-bold mb-4">Filter by category</h5>
                            @foreach($categories as $cat)
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input" name="categories[]" id="{{$cat->id}}" value="{{$cat->id}}">
                                    <label class="custom-control-label" for="{{$cat->id}}">{{$cat->name}}</label>
                                    <span class="badge border font-weight-normal">{{$cat->products_count}}</span>
                                </div>
                            @endforeach
                        </div>
                        <x-user.form.button-input title="Filter"></x-user.form.button-input>
                    </form>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <form action="{{route('shop.search')}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by name" name="product">
                                        <div class="input-group-append">
                                            <button type="submit" class="border-0">
                                                <span class="input-group-text bg-transparent text-primary">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if(isset($search))
                                    <div>Searching for <code>{{$search}}</code></div>
                                @endif
                                <div class="dropdown ml-4">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="{{route('shop' , 'created_at')}}">Latest</a>
                                        <a class="dropdown-item" href="{{route('shop' , 'price')}}">Price</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{asset($product->image)}}" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{$product->price}}</h6><h6 class="text-muted ml-2">
                                                <del>{{$product->price + $product->price * 0.1}}</del></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{route('details' , $product->id)}}" class="btn btn-sm text-dark p-0">
                                            <i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                        @auth
                                            @if($product->favourites->contains(auth()->id()))
                                                <a onclick="like({{$product->id}})" class="btn btn-sm text-dark p-0"
                                                   id="like{{$product->id}}"><i class="fas fa-heart text-primary mr-1"></i>Unlike</a>
                                            @else
                                                <a onclick="like({{$product->id}})" class="btn btn-sm text-dark p-0"
                                                   id="like{{$product->id}}"><i class="far fa-heart text-primary mr-1"></i>Like</a>
                                            @endif
                                            @if($product->carts->contains(session()->get('cartId')))
                                                <a href="{{route('cart')}}" class="btn btn-sm text-dark p-0">
                                                    <i class="fas fa-shopping-cart text-primary mr-1">
                                                    </i>Show In Cart</a>
                                            @else
                                                <form action="{{route('cart')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <button class="btn btn-sm text-dark p-0" type="submit">
                                                        <i class="fas fa-shopping-cart text-primary mr-1">
                                                        </i>Add To Cart</button>
                                                </form>
                                            @endif
                                        @endauth
                                        @guest
                                            <a href="{{route('login')}}" class="btn btn-sm text-dark p-0">
                                                <i class="far fa-heart text-primary mr-1"></i>Like</a>
                                            <a href="{{route('login')}}" class="btn btn-sm text-dark p-0">
                                                <i class="fas fa-shopping-cart text-primary mr-1">
                                                </i>Add To Cart</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                    <li>{{$products->links()}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user.layout>
