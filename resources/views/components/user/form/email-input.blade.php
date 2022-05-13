@props(['name' => 'email', 'placeholder' => 'Email Address' , 'required' => '' , 'value' => ''])

@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror
<div class="input-group mb-3">
    <input name="{{$name}}" type="email" value="{{$value ?? old($name)}}" placeholder="{{$placeholder}}"
           class="form-control p-4 border border-primary" {{$required}}>
</div>
