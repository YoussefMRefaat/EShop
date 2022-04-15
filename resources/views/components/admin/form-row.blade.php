@props(['title' => '' , 'action' , 'method' => 'POST' , 'enctype' => 'application/x-www-form-urlencoded' ,
    'submit' => 'Add'])

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$title}}</h4>
                <form class="forms-sample" method="POST"
                      action="{{$action}}" enctype="{{$enctype}}">
                    @method($method)
                    @csrf
                    {{$inputs}}
                    <button type="submit" class="btn btn-primary mr-2 btn-success">{{$submit}}</button>
                    <input type="reset" class="btn btn-light mr-2 border-0 btn-outline-danger"
                           value="Clear">
                </form>
            </div>
        </div>
    </div>
</div>
