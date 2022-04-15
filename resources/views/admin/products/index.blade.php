<x-admin.layout>
    <x-slot name="search">
        <x-admin.searchBar :action="route('dashboard.products.search')" taxonomy="Products">
        </x-admin.searchBar>
    </x-slot>
    <x-slot name="rows">
        <x-admin.button-row :target="route('dashboard.products.create')" value="Add Product">
        </x-admin.button-row>
        <x-admin.table-row title="Products">
            <x-slot name="thead">
                <tr>
                    <th> Name </th>
                    <th> Category </th>
                    <th> Description </th>
                    <th> Image </th>
                    <th> Price </th>
                    <th> Show </th>
                    <th> Stock </th>
                    <th> Liked </th>
                    <th> Ordered </th>
                    <th>  </th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach($products as $product)
                    <tr>
                        <td> {{$product->name}} </td>
                        <td> <a href="{{route('dashboard.categories.show' , $product->category_id)}}">
                                {{$product->category->name}}</a> </td>
                        <td> {{$product->description}} </td>
                        <td>
                            <img src="{{asset($product->image)}}"  alt="Product">
                        </td>
                        <td> {{$product->price}} </td>
                        <td> {{$product->show ? 'visible' : 'hidden'}} </td>
                        <td> {{$product->stock}} </td>
                        <td> {{$product->favourites_count}}</td>
                        <td> {{$product->orders_count}} </td>
                        <td>
                            <a href="{{route('dashboard.products.edit' , $product->id)}}"
                               class="btn btn-light btn-sm m-1">
                                <i class="ti-settings"></i>
                            </a>
                            <form class="d-md-inline m-1" method="POST"
                                  action="{{route('dashboard.products.edit' , $product->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-light
                                btn-sm border-0 btn-outline-danger">
                                    <i class="ti-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.table-row>
    </x-slot>
</x-admin.layout>
