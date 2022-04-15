@props(['name' => 'password' , 'placeholder' => 'Password' , 'required' => ''])

@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror
<div class="input-group mb-3">
    <input name="{{$name}}" type="password" class="form-control p-4 border border-primary"
           placeholder="{{$placeholder}}" {{$required}}>
</div>
