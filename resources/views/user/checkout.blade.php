<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Checkout"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        @if(session('success'))
                            <p class="text-success">{{session('success')}}</p>
                        @endif
                        @if(session('error'))
                            <p class="text-danger">{{session('error')}}</p>
                        @endif
                            <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <div>
                            <form class="row" action="{{ route('user.update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6 form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{auth()->user()->name}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="email"
                                           value="{{auth()->user()->email}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="phone"
                                           value="{{auth()->user()->phone ?? old('phone')}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line </label>
                                    <input class="form-control" type="text" name="address"
                                           value="{{auth()->user()->address ?? old('address')}}">
                                </div>
                                    <button class="btn btn-primary" type="submit">Update Your Data</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Cart Products</h5>
                            @foreach($products as $product)
                                <div class="d-flex justify-content-between">
                                    <p>{{$product->name}}</p>
                                    <p>{{$product->pivot->quantity}}</p>
                                    <p>${{$product->price * $product->pivot->quantity}}</p>
                                </div>
                            @endforeach
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">${{$total}}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">${{$ship}}</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">${{$ship + $total}}</h5>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <form action="{{route('checkout')}}" method="POST">
                                @csrf
                                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user.layout>
