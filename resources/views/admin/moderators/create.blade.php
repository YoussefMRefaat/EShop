<x-admin.layout>
    <x-slot name="rows">
        <x-admin.form-row title="Add Moderator" :action="route('dashboard.moderators')">
            <x-slot name="inputs">
                <x-admin.form.text-input name="name" title="Name" :value="old('name')"></x-admin.form.text-input>
                <x-admin.form.text-input name="email" title="Email" :value="old('email')"></x-admin.form.text-input>
                <x-admin.form.password-input name="password" title="Password"></x-admin.form.password-input>
                <x-admin.form.password-input name="password_confirmation" title="Confirm Password"></x-admin.form.password-input>
                <x-admin.form.text-input name="address" title="Address" :value="old('address')"></x-admin.form.text-input>
                <x-admin.form.text-input name="phone" title="Phone" :value="old('phone')"></x-admin.form.text-input>
            </x-slot>
        </x-admin.form-row>
    </x-slot>
</x-admin.layout>
