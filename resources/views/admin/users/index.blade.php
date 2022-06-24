<x-admin.layout>
    <x-slot name="rows">
        <x-admin.table-row title="Users">
            <x-slot name="thead">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Last Active</th>
                    <th>Show</th>
                    <th>Ban</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->last_active}}</td>
                        <td>
                            <a href="{{route('dashboard.users.show' , $user->id)}}"
                               class="btn btn-light btn-sm m-1 border-0 btn-outline-info"><i class="ti-eye"></i> </a>
                        </td>
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
                @endforeach
            </x-slot>
        </x-admin.table-row>
    </x-slot>
</x-admin.layout>
