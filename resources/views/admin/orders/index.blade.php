<x-admin.layout>
    <x-slot name="rows">
        <x-admin.table-row>
            <x-slot name="title">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <ul class="nav navbar-expand-md mr-auto">
                            <li class="nav-item m-sm-2">
                                <a href="{{route('dashboard.orders')}}" class="nav-link">All</a></li>
                            @foreach(\App\Enums\OrderStatus::values() as $value)
                                <li class="nav-item m-sm-2">
                                    <a href="{{route('dashboard.orders.status' , $value)}}" class="nav-link">{{ $value }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </x-slot>
            <x-slot name="thead">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Ordered date</th>
                    <th>Shipped date</th>
                    <th>Delivered date</th>
                    <th>Ship fee</th>
                    <th>Total payment</th>
                    <th>Show</th>
                    <th>Ship</th>
                    <th>Deliver</th>
                    <th>Cancel</th>
                    <th>Restore</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td><a href="{{route('dashboard.users.show' , $order->user->id)}}">
                                {{$order->user->name}}</a></td>
                        <td>
                            <label class="badge badge-{{$order->status->badge()}}">{{ $order->status->value }}</label>
                        </td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->shipped_at}}</td>
                        <td>{{$order->delivered_at}}</td>
                        <td>{{$order->ship_fee}}</td>
                        <td>{{$order->total_price + $order->ship_fee}}</td>
                        <td>
                            <a href="{{route('dashboard.orders.show' , $order->id)}}"
                               class="btn btn-light btn-sm m-1 border-0 btn-outline-info"><i class="ti-eye"></i> </a>
                        </td>
                        <td>
                            @if($order->status == \App\Enums\OrderStatus::Pending)
                                <form class="d-md-inline m-1"
                                      action="{{route('dashboard.orders.ship' , $order->id)}}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-outline-facebook btn-sm border-0">
                                        <i class="ti-truck"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if($order->status == \App\Enums\OrderStatus::Shipped)
                                <form class="d-md-inline m-1" method="POST"
                                      action="{{route('dashboard.orders.deliver' , $order->id)}}">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-light btn-outline-success btn-sm border-0">
                                        <i class="ti-target"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if(!in_array($order->status,[\App\Enums\OrderStatus::Cancelled,\App\Enums\OrderStatus::Restored]))
                                <form class="d-md-inline m-1" method="POST"
                                      action="{{route('dashboard.orders.cancel' , $order->id)}}">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-light btn-sm border-0 btn-outline-danger">
                                        <i class="ti-close"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if(in_array($order->status , [\App\Enums\OrderStatus::Cancelled , \App\Enums\OrderStatus::Pending]))
                                <form class="d-md-inline m-1" method="POST"
                                      action="{{route('dashboard.orders.restore' , $order->id)}}">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-light btn-sm border-0 btn-outline-github">
                                        <i class="ti-briefcase"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="paginate">{{$orders->links()}}</x-slot>
        </x-admin.table-row>
    </x-slot>
</x-admin.layout>
