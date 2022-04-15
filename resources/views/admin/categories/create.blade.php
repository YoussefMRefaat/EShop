<x-admin.layout>
    <x-slot name="rows">
        <x-admin.form-row title="Add Category" :action="route('dashboard.categories')">
            <x-slot name="inputs">
                <x-admin.form.text-input name="name" title="Name" :value="old('name')"></x-admin.form.text-input>
                <x-admin.form.select-input name="parent_id" title="Parent Category">
                    <x-slot name="options">
                        <option selected value="">No Parent</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </x-slot>
                </x-admin.form.select-input>
            </x-slot>
        </x-admin.form-row>
    </x-slot>
</x-admin.layout>
