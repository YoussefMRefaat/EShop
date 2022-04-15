@props(['title' => '' , 'thead' => '' , 'tbody' => '' , 'paginate' => ''])

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$title}}</h4>
                @if(isset($searchFor))
                    <p class="card-description">
                        Searching for <code>{{$searchFor}}</code>
                    </p>
                @endif
                @if(session()->has('success'))
                    <p class="card-description text-success">
                        {{session()->get('success')}}
                    </p>
                @endif
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            {{$thead}}
                        </thead>
                        <tbody>
                            {{$tbody}}
                        </tbody>
                    </table>
                </div>
                {{$paginate}}
            </div>
        </div>
    </div>
</div>
