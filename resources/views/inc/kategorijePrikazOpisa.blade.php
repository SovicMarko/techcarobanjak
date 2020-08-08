<div class="jumbotron row">

    @foreach ($kategorije as $kategorija)
    <div class="col col-md-3">
        <div class="card text-center bg-dark text-light">
            <div class="card-header pt-5 pb-5">
                {{$kategorija->naziv}}
            </div>
            <div class="card-body bg-light text-dark">
                {{$kategorija->opis}}
            </div>
        </div>
    </div>

    {{-- @if($loop->iteration != 3)
    <div class="p-2"></div>
    @endif --}}

    @endforeach

</div>
