<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Cart"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($products as $product)
                                <tr>
                                    <td class="align-middle"><img src="{{asset($product->image)}}" alt="" style="width: 50px;">
                                        <a href="{{route('details' , $product->id)}}">{{$product->name}}</a>
                                    </td>
                                    <td class="align-middle">${{$product->price}}</td>
                                    <td class="align-middle" >
                                        <form action="{{route('cart')}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-sm btn-light btn-outline-primary btn-minus">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control form-control-sm bg-secondary
                                                text-center" name="quantity" value="{{$product->pivot->quantity}}">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-sm btn-light btn-outline-primary btn-plus">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="btn-group-sm">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="align-middle">${{$product->price * $product->pivot->quantity}}</td>
                                    <td class="align-middle">
                                        <form action="{{route('cart')}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button class="btn btn-sm btn-primary" type="submit">
                                                <i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">${{$total}}</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">${{$total}}</h5>
                            </div>
                            <a href="{{route('checkout')}}">
                                <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user.layout>
