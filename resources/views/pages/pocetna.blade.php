@extends('layouts.app')

@section('slajder')
<div  class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://www.gigatron.rs/img/src/slideshow/a05b101881e1493e3157d174d654566b.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://www.gigatron.rs/img/src/slideshow/59fa680772736b9925f476614c3a126e.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://www.gigatron.rs/img/src/slideshow/59fa680772736b9925f476614c3a126e.jpg" alt="Third slide">
      </div>
    </div>
  </div>
@endsection

@section('sadrzaj')
<h3 class="text-center pb-5">Najovije u ponudi</h3>

    <div class="row">
    @if(count($postovi)>0)
    @foreach($postovi as $objava)

    <div class="col-6 col-md-4 col-lg-3">
        <div class="card card-pocetna mb-5">
            <div class="card-body card-body-pocetna"><img src="{{ asset('storage/' . $objava->image )}}" class="img-thumbnail"></div>
            <div class="card-footer"><a href="posts/{{$objava->id}}">{{$objava->title}}</a>
                @if($objava->popust != null)
                    <h6><del>{{$objava->cena}} din</del></h6>
                    <h5>{{$objava->nova_cena}} din</h5>
                    <div class="popust">-{{$objava->popust}}%</div>
                @else
                    <h5>{{$objava->cena}} din</h5>
                @endif
            </div>
        </div>
    </div>
    @if($loop->iteration == 4)
        @include('inc.kategorijePrikazOpisa')
    @endif
    @endforeach
    @else
    <p>
    No Posts found
    </p>
    @endif

@endsection

@section('izdvojeno')
    <div class="container">
        <h3 class="text-center text-warning p-5">Izdvajamo iz ponude</h3>
        <div class="row">
            @if(count($postovi)>0)
            @foreach($postovi as $objava)
            @if($objava->izdvojeno)
            <div class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card card-pocetna mb-5">
                    <div class="card-body card-body-pocetna "><img src="{{ asset('storage/' . $objava->image )}}" class="img-thumbnail"></div>
                    <div class="card-footer"><a href="posts/{{$objava->id}}">{{$objava->title}}</a>
                        @if($objava->popust != null)
                            <h6><del>{{$objava->cena}} din</del></h6>
                            <h5>{{$objava->nova_cena}} din</h5>
                            <div class="popust">-{{$objava->popust}}%</div>
                        @else
                            <h5>{{$objava->cena}} din</h5>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
@endsection
