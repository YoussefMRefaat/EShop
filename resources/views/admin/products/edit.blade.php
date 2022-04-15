<x-admin.layout>
    <x-slot name="search">
        <x-admin.searchBar :action="route('dashboard.products.search')" taxonomy="Products">
        </x-admin.searchBar>
    </x-slot>
    <x-slot name="rows">
        <x-admin.form-row title="Edit Product" :action="route('dashboard.products.edit' , $product->id)"
                          method="PATCH" submit="Update">
            <x-slot name="inputs">
                <x-admin.form.text-input name="name" title="Name" :value="$product->name"></x-admin.form.text-input>
                <x-admin.form.select-input name="category_id" title="Category">
                    <x-slot name="options">
                        <option selected value={{$product->category_id}}>{{$product->category->name}}</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </x-slot>
                </x-admin.form.select-input>
                <x-admin.form.text-area-input name="description" title="Description" :value="$product->description">
                </x-admin.form.text-area-input>
                <x-admin.form.number-input name="price" title="Price" :value="$product->price"></x-admin.form.number-input>
                <x-admin.form.number-input name="stock" title="Stock" :value="$product->stock"></x-admin.form.number-input>
                <x-admin.form.select-input name="show" title="Display" required="required">
                    <x-slot name="options">
                        <option @if($product->show) selected @endif value="1">Show</option>
                        <option @if(!$product->show) selected @endif value="0">Hidden</option>
                    </x-slot>
                </x-admin.form.select-input>
            </x-slot>
        </x-admin.form-row>
        <x-admin.form-row title="Edit Image" :action="route('dashboard.products.edit-image' , $product->id)"
                          method="PATCH" enctype="multipart/form-data" submit="Update Image">
            <x-slot name="inputs">
                <x-admin.form.file-input name="image" title="Image"></x-admin.form.file-input>
            </x-slot>
        </x-admin.form-row>
    </x-slot>
</x-admin.layout>
