@props(['name' => 'remember' , 'label' => 'Remember Me' , 'required' => ''])

@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror
<div class="input-group-sm">
    <input type="checkbox" name="{{$name}}" id="{{$name}}" class="form-check-inline" {{$required}}>
    <label for="{{$name}}" class="form-check-label ">{{$label}}</label>
</div>
