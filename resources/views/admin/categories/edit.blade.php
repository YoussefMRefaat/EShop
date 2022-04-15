<x-admin.layout>
    <x-slot name="rows">
        <x-admin.form-row title="Edit Category" :action="route('dashboard.categories.show' , $category->id)"
                          method="PATCH" submit="Update">
            <x-slot name="inputs">
                <x-admin.form.text-input name="name" title="Name" :value="$category->name">
                </x-admin.form.text-input>
                <x-admin.form.select-input name="parent_id" title="Parent Category">
                    <x-slot name="options">
                        @if(isset($category->parent_id))
                            <option selected value="{{$category->parent_id}}">{{$category->parent->name}}</option>
                            <option value="">No Parent</option>
                        @else
                            <option selected value="">No Parent</option>
                        @endif
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </x-slot>
                </x-admin.form.select-input>
            </x-slot>
        </x-admin.form-row>
    </x-slot>
</x-admin.layout>
