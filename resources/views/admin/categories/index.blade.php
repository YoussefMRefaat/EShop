<x-admin.layout>
    <x-slot name="rows">
        <x-admin.button-row :target="route('dashboard.categories.create')" value="Add Category">
        </x-admin.button-row>
        <x-admin.table-row title="Categories">
            <x-slot name="thead">
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> </th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach($categories as $i => $category)
                    <tr>
                        <td> {{$i + 1}} </td>
                        <td> {{$category->name}} </td>
                        <td>
                            <a href="{{route('dashboard.categories.show' , $category->id)}}"
                               class="btn btn-light btn-sm m-1">
                                <i class="ti-eye"></i>
                            </a>
                            <a href="{{route('dashboard.categories.edit' , $category->id)}}"
                               class="btn btn-light btn-sm m-1">
                                <i class="ti-settings"></i>
                            </a>
                            <form class="d-md-inline m-1" method="POST"
                                  action="{{route('dashboard.categories.show' , $category->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-light
                                    btn-sm border-0 btn-outline-danger">
                                    <i class="ti-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @foreach($category->children as $x => $child)
                        <tr class="table-sm table-secondary">
                            <td class="pl-3">{{$i+1 . '-' . $x+1}}</td>
                            <td class="pl-3"> {{$child->name}} </td>
                            <td class="pl-3">
                                <a href="{{route('dashboard.categories.show' , $child->id)}}"
                                   class="btn btn-light btn-sm m-1">
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="{{route('dashboard.categories.edit' , $child->id)}}"
                                   class="btn btn-light btn-sm m-1"><i class="ti-settings"></i>
                                </a>
                                <form class="d-md-inline m-1"  action="{{route('dashboard.categories.show'  , $child->id)}}"
                                      method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm border-0 btn-outline-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </x-slot>
        </x-admin.table-row>
    </x-slot>
</x-admin.layout>
