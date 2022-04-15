@props(['name' , 'title' => '' , 'options'])

<div class="form-group">
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror
    <label for="{{$name}}">{{$title}}</label>
    <select id="{{$name}}" class="form-control" name="{{$name}}" {{$attributes}}>
        {{$options}}
    </select>
</div>
