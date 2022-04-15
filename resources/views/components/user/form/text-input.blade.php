@props(['name' => 'name' , 'title' => 'Full Name' , 'value' => '' , 'required' => ''])

@error($name)
    <p class="text-danger">{{$message}}</p>
@enderror
<div class="input-group mb-3">
    <input type="text" class="form-control p-4 border border-primary" placeholder="{{$title}}"
           name="{{$name}}" value="{{ $value }}" {{$required}}>
</div>
