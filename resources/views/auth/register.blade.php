<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Register"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <x-user.form-row :action="route('register')">
            <x-slot name="inputs">
                <x-user.form.text-input :value="old('name')" required="required"></x-user.form.text-input>
                <x-user.form.email-input :value="old('email')" required="required"></x-user.form.email-input>
                <x-user.form.text-input :value="old('address')" name="address" title="Address" required="required">
                </x-user.form.text-input>
                <x-user.form.text-input :value="old('phone')" name="phone"
                                        title="Phone Number Like 01012345678" required="required">
                </x-user.form.text-input>
                <x-user.form.password-input required="required"></x-user.form.password-input>
                <x-user.form.password-input required="required" name="password_confirmation" placeholder="Confirm password">
                </x-user.form.password-input>
                <x-user.form.button-input title="Sign Up"></x-user.form.button-input>
                <div class="input-group">
                    <a href=" {{ route('login') }} ">Already have an account?</a>
                </div>
            </x-slot>
        </x-user.form-row>
    </x-slot>
</x-user.layout>
