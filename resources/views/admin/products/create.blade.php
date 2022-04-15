<x-admin.layout>
    <x-slot name="search">
        <x-admin.searchBar :action="route('dashboard.products.search')" taxonomy="Products">
        </x-admin.searchBar>
    </x-slot>
    <x-slot name="rows">
        <x-admin.form-row title="Add Product" :action="route('dashboard.products')" enctype="multipart/form-data">
            <x-slot name="inputs">
                <x-admin.form.text-input name="name" title="Name" :value="old('name')"></x-admin.form.text-input>
                <x-admin.form.select-input name="category_id" title="Category" required="required">
                    <x-slot name="options">
                        <option selected disabled value="">Choose a category</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </x-slot>
                </x-admin.form.select-input>
                <x-admin.form.text-area-input name="description" title="Description" :value="old('description')">
                </x-admin.form.text-area-input>
                <x-admin.form.number-input name="price" title="Price" :value="old('price')"></x-admin.form.number-input>
                <x-admin.form.select-input name="show" title="Display" required="required">
                    <x-slot name="options">
                        <option selected value="1">Show</option>
                        <option value="0">Hidden</option>
                    </x-slot>
                </x-admin.form.select-input>
                <x-admin.form.number-input name="stock" title="Stock" :value="old('stock')"></x-admin.form.number-input>
                <x-admin.form.file-input name="image" title="Image"></x-admin.form.file-input>
            </x-slot>
        </x-admin.form-row>
    </x-slot>
</x-admin.layout>
