<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Reset Password"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <x-user.form-row :action="route('password.update')">
            <x-slot name="inputs">
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <x-user.form.email-input :value="old('email' , $request->email)" required="required"></x-user.form.email-input>
                <x-user.form.password-input required="required"></x-user.form.password-input>
                <x-user.form.password-input required="required" name="password_confirmation" placeholder="Confirm password">
                </x-user.form.password-input>
                <x-user.form.button-input title="Reset"></x-user.form.button-input>
            </x-slot>
        </x-user.form-row>
    </x-slot>
</x-user.layout>
