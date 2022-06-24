<x-admin.layout>
    <x-slot name="rows">
        <x-admin.button-row :target="route('dashboard.moderators.create')" value="Add Moderator">
        </x-admin.button-row>
        <x-admin.table-row title="moderators">
            <x-slot name="thead">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Last Active</th>
                    <th>Show</th>
                    <th>Delete</th>
                    <th>Ban as user</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach($moderators as $moderator)
                    <tr>
                        <td>{{$moderator->id}}</td>
                        <td>{{$moderator->name}}</td>
                        <td>{{$moderator->email}}</td>
                        <td>{{$moderator->address}}</td>
                        <td>{{$moderator->phone}}</td>
                        <td>{{$moderator->last_active}}</td>
                        <td>
                            <a href="{{route('dashboard.moderators.show' , $moderator->id)}}"
                               class="btn btn-light btn-sm m-1 border-0 btn-outline-info"><i class="ti-eye"></i> </a>
                        </td>
                        <td>
                            <form class="d-md-inline m-1"
                                  action="{{route('dashboard.moderators.show' , $moderator->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-light btn-outline-danger btn-sm border-0">
                                    <i class="ti-close"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form class="d-md-inline m-1"
                                  action="{{route('dashboard.moderators.show' , $moderator->id)}}" method="POST">
                                @method('PATCH')
                                @csrf
                                @if($moderator->is_banned)
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
