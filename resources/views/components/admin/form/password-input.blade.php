@props(['name' , 'title' => '' , 'value' => ''])

<div class="form-group">
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror
    <label for="{{$name}}">{{$title}}</label>
    <input type="password" class="form-control" id="{{$name}}"
           placeholder="{{$title}}" name="{{$name}}" required>
</div>
