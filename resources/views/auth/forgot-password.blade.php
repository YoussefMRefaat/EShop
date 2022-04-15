<x-user.layout>
    <x-slot name="heading">
        <x-user.heading title="Forgot Password"></x-user.heading>
    </x-slot>
    <x-slot name="content">
        <x-user.form-row :action="route('password.email')">
            <x-slot name="inputs">
                @if(session()->has('status'))
                    <p class="text-success">{{session()->get('status')}}</p>
                @endif
                <x-user.form.email-input :value="old('email')" required="required"></x-user.form.email-input>
                <x-user.form.button-input title="Send a link"></x-user.form.button-input>
            </x-slot>
        </x-user.form-row>
    </x-slot>
</x-user.layout>
