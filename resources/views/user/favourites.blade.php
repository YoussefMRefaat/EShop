<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Favourites"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="row pb-3">
                    @foreach($products as $product)
                        <div class="col pb-1">
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
                                    <a onclick="like({{$product->id}})" class="btn btn-sm text-dark p-0" id="like{{$product->id}}">
                                        <i class="fas fa-heart text-primary mr-1"></i>Unlike</a>
                                    <form action="{{route('cart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button class="btn btn-sm text-dark p-0" type="submit">
                                            <i class="fas fa-shopping-cart text-primary mr-1">
                                            </i>Add To Cart</button>
                                    </form>
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
    </x-slot>
</x-user.layout>
