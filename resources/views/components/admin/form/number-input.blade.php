@props([ 'name' , 'title' => '' , 'value' => ''])

<div class="form-group">
    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror
    <label for="{{$name}}">{{$title}}</label>
    <input type="number" class="form-control" id="{{$name}}"
           placeholder="{{$title}}" name="{{$name}}"
           value="{{$value}}" required>
</div>
