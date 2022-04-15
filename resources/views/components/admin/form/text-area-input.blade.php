@props(['name' , 'title' => '' , 'value'])

<div class="form-group">
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror
    <label for="{{$name}}">{{$title}}</label>
    <textarea class="form-control" id="{{$name}}" name="{{$name}}" required>{{$value}}</textarea>
</div>
