@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('uspesno'))
    <div class="alert alert-success pointer">
        {{session('uspesno')}}
        <span class="float-right alert-greska" >X</span>
    </div>
@endif
