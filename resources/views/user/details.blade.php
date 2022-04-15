<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Product Details"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{asset($product->image)}}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                    <div class="d-flex mb-3"></div>
                    <h3 class="font-weight-semi-bold mb-4">${{$product->price}}
                        <del>${{$product->price + $product->price * 0.1}}</del></h3>
                    <p class="mb-4">{{$product->description}}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        @auth
                            @if($product->favourites->contains(auth()->id()))
                                <a onclick="like({{$product->id}})" class="btn btn-sm text-dark p-0" >
                                    <button class="btn btn-light btn-outline-primary" id="like{{$product->id}}">
                                        <i class="fas fa-heart text-primary mr-1"></i>Unlike</button></a>
                            @else
                                <a onclick="like({{$product->id}})" class="btn btn-sm text-dark p-0">
                                    <button class="btn btn-light btn-outline-primary" id="like{{$product->id}}">
                                        <i class="far fa-heart text-primary mr-1"></i>Like</button></a>
                            @endif
                            @if($product->carts->contains(session()->get('cartId')))
                                <a href="{{route('cart')}}" class="btn btn-sm text-dark p-0">
                                    <button class="btn btn-primary px-3 ml-2"><i class="fa fa-shopping-cart mr-1"></i>
                                        Show In Cart</button> </a>
                            @else
                                <form action="{{route('cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button class="btn btn-primary px-3 ml-2" type="submit">
                                        <i class="fas fa-shopping-cart text-light mr-1">
                                        </i>Add To Cart</button>
                                </form>
                            @endif
                        @endauth
                        @guest
                            <a href="{{route('login')}}" class="btn btn-sm text-dark p-0">
                                <button class="btn btn-light btn-outline-primary">
                                    <i class="far fa-heart text-primary mr-1"></i>Like</button></a>
                            <a href="{{route('login')}}" class="btn btn-sm text-dark p-0">
                                <button class="btn btn-primary px-3 ml-2"><i class="fa fa-shopping-cart mr-1"></i>
                                    Add To Cart</button> </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        @foreach($products as $prod)
                            <div class="card product-item border-0">
                                <div class="card-header product-img position-relative overflow-hidden
                                bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{asset($prod->image)}}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{$prod->name}}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>${{$prod->price}}</h6><h6 class="text-muted ml-2">
                                            <del>${{$prod->price + $prod->price * 0.1}}
                                            </del></h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    @auth
                                        @if($prod->favourites->contains(auth()->id()))
                                            <a onclick="like({{$prod->id}})" class="btn btn-sm text-dark p-0"
                                               id="like{{$prod->id}}"><i class="fas fa-heart text-primary mr-1"></i>Unlike</a>
                                        @else
                                            <a onclick="like({{$prod->id}})" class="btn btn-sm text-dark p-0"
                                               id="like{{$prod->id}}"><i class="far fa-heart text-primary mr-1"></i>Like</a>
                                        @endif
                                        @if($prod->carts->contains(session()->get('cartId')))
                                            <a href="{{route('cart')}}" class="btn btn-sm text-dark p-0">
                                                <i class="fas fa-shopping-cart text-primary mr-1">
                                                </i>Show In Cart</a>
                                        @else
                                            <form action="{{route('cart')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$prod->id}}">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user.layout>
