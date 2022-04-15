<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Update data">
        </x-user.heading>
    </x-slot>
    <x-slot name="content">
        <x-user.form-row method="PATCH" :action="route('user.update')">
            <x-slot name="inputs">
                <x-user.form.text-input :value="auth()->user()->name" required="required"></x-user.form.text-input>
                <x-user.form.email-input :value="auth()->user()->email" required="required"></x-user.form.email-input>
                <x-user.form.text-input :value="auth()->user()->address" required="required" name="address"
                                        title="Address"></x-user.form.text-input>
                <x-user.form.text-input :value="auth()->user()->phone" required="required" name="phone"
                                        title="Phone Number"></x-user.form.text-input>
                <x-user.form.button-input title="update"></x-user.form.button-input>
                <div class="input-group">
                    <a href=" {{ route('user.update_password') }} ">Update Password</a>
                </div>
            </x-slot>
        </x-user.form-row>
    </x-slot>
</x-user.layout>
