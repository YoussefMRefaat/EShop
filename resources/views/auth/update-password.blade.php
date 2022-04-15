<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Update Password">
        </x-user.heading>
    </x-slot>
    <x-slot name="content">
        <x-user.form-row method="PATCH" :action="route('user.update_password')">
            <x-slot name="inputs">
                @if(auth()->user()->has_password)
                    <x-user.form.password-input name="old_password" placeholder="Old Password" required="required">
                    </x-user.form.password-input>
                @endif
                <x-user.form.password-input required="required"></x-user.form.password-input>
                <x-user.form.password-input required="required" name="password_confirmation" placeholder="Confirm new password">
                </x-user.form.password-input>
                <x-user.form.button-input title="update"></x-user.form.button-input>
                <div class="input-group">
                    <a href=" {{ route('user.update_password') }} ">Update Password</a>
                </div>
            </x-slot>
        </x-user.form-row>
    </x-slot>
</x-user.layout>
