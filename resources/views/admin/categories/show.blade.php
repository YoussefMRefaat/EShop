<x-admin.layout>
    <x-slot name="rows">
        @if(count($category->children) > 0)
            <x-admin.table-row :title="$category->name . ' Subcategories'">
                <x-slot name="thead">
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> </th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach($category->children as $x => $child)
                        <tr class="table-sm table-secondary">
                            <td class="pl-3">{{$x+1}}</td>
                            <td class="pl-3"> {{$child->name}} </td>
                            <td class="pl-3">
                                <a href="{{route('dashboard.categories.show' , $child->id)}}"
                                   class="btn btn-light btn-sm m-1">
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="{{route('dashboard.categories.edit' , $child->id)}}"
                                   class="btn btn-light btn-sm m-1"><i class="ti-settings"></i>
                                </a>
                                <form class="d-md-inline m-1" method="POST"
                                      action="{{route('dashboard.categories.show'  , $child->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm border-0 btn-outline-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table-row>
        @endif

        @if(count($category->products) > 0)
            <x-admin.table-row :title="$category->name . ' Products'">
                <x-slot name="thead">
                    <tr>
                        <th> Name </th>
                        <th> Description </th>
                        <th> Image </th>
                        <th> Price </th>
                        <th> Stock </th>
                        <th>  </th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach($category->products as $product)
                        <tr>
                            <td> {{$product->name}} </td>
                            <td> {{$product->description}} </td>
                            <td> <img src="{{asset($product->image)}}"  alt="Product"> </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->stock}} </td>
                            <td>
                                <a href="{{route('dashboard.products.edit' , $product->id)}}"
                                   class="btn btn-light btn-sm m-1">
                                    <i class="ti-settings"></i>
                                </a>

                                <form class="d-md-inline m-1" method="POST"
                                      action="{{route('dashboard.products.edit' , $product->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm border-0 btn-outline-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table-row>
        @endif
    </x-slot>
</x-admin.layout>
