@props(['target' => '' , 'value' => ''])

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{$target}}">
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                        <i class="ti-clipboard btn-icon-prepend"></i>
                        {{$value}}
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
