<x-admin.layout>
    <x-slot name="rows">
        <x-admin.table-row>
            <x-slot name="thead">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Last Active</th>
                    <th>ban</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->last_active}}</td>
                    <td>
                        <form class="d-md-inline m-1"
                              action="{{route('dashboard.users.show' , $user->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            @if($user->is_banned)
                                <button type="submit" class="btn btn-light btn-outline-success btn-sm border-0">
                                    <i class="ti-unlock"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-light btn-outline-danger btn-sm border-0">
                                    <i class="ti-na"></i>
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
            </x-slot>
        </x-admin.table-row>
        <x-admin.table-row>
            <x-slot name="thead">
                <tr>
                    <th>ID</th>
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
                @foreach($user->orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>
                            @switch($order->status)
                                @case('pending')
                                <label class="badge badge-warning">Pending</label>
                                @break
                                @case('shipped')
                                <label class="badge badge-info">Shipped</label>
                                @break
                                @case('delivered')
                                <label class="badge badge-success">Delivered</label>
                                @break
                                @case('cancelled')
                                <label class="badge badge-danger">Cancelled</label>
                                @break
                                @case('restored')
                                <label class="badge badge-dark">Restored</label>
                            @endswitch
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
                            @if($order->status == 'pending')
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
                            @if($order->status == 'shipped')
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
                            @if(!in_array($order->status,['cancelled','restored']))
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
                            @if(in_array($order->status , ['cancelled' , 'pending']))
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
        </x-admin.table-row>
    </x-slot>
</x-admin.layout>
