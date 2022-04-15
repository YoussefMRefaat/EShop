<x-user.layout>
    <x-slot name="heading">
        <x-user.slider :sliderProducts="$sliderProducts"></x-user.slider>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                        <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            <p class="text-right">{{$category->products_count}} Products</p>
                            <a href="{{route('shop.category' , $category->id)}}"
                               class="cat-img position-relative overflow-hidden mb-3">
                                <img class="img-fluid" alt=""
                                     src="{{asset($products->where('category_id' , $category->id)->first()->image)}}">
                            </a>
                            <h5 class="font-weight-semi-bold m-0">{{$category->name}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Trendy Products</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">
                @foreach($trendyProducts as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{asset($product->image)}}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{$product->price}}$</h6><h6 class="text-muted ml-2">
                                        <del>{{$product->price + $product->price * 0.1}}$</del></h6>
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
            </div>
        </div>
    </x-slot>
</x-user.layout>
