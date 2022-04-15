<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Login">
        </x-user.heading>
    </x-slot>
    <x-slot name="content">
        <x-user.form-row :action="route('login')">
            <x-slot name="inputs">
                <x-user.form.email-input required="required" :value="old('email')"></x-user.form.email-input>
                <x-user.form.password-input required="required"></x-user.form.password-input>
                <x-user.form.checkbox-input></x-user.form.checkbox-input>
                <x-user.form.button-input title="Login"></x-user.form.button-input>
                <div class="input-group">
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div>
                <div class="input-group">
                    <a href="{{ route('social.redirect') }}" class="btn btn-primary btn-block">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png"> Login with Google
                    </a>
                </div>
            </x-slot>
        </x-user.form-row>
    </x-slot>
</x-user.layout>
