@props(['name' , 'title' => ''])

@error($name)
<p class="text-danger">{{$message}}</p>
@enderror
<div class="form-group">
    <label>{{$title}}</label>
    <div class="input-group col-xs-12">
        <span class="input-group-append ">
            <input class="file-upload-browse ti-upload btn btn-primary"
                   type="file" name="{{$name}}" required>
        </span>
    </div>
</div>
