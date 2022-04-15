@props(['action' , 'inputs' , 'method' => 'POST'])

<div class="container-fluid pt-5 ">
    <div class="row px-xl-5 ">
        <div class="col-lg-4 table-responsive mb-5">
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="{{$action}}" method="POST">
                @method($method)
                @csrf
                @if(session()->has('success'))
                    <p class="text-success">{{ session()->get('success') }}</p>
                @endif
                {{$inputs}}
            </form>
        </div>
    </div>
</div>
