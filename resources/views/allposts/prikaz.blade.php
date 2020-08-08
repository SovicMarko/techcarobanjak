@extends('layouts.app')

@section('sadrzaj')



 <div class="card">

    <div class="card-header">
     <h3>{{$jednaobjava->title}}</h3>
    </div>

  <div class="card-body">
      <div class="row">
          <div class="col col-sm-12 col-md-6">
            <img src="{{ asset('storage/' . $jednaobjava->slika )}}" class="img-thumbnail">
          </div>
          <div class="col col-sm-12 col-md-6">
            <h3>Karakteristike</h3>
            <p class="card-text">{!! $jednaobjava->body !!}</p>
            <p> Kategorija: {{$jednaobjava->naziv}}</p>
            @if ($jednaobjava->popust != null)
                <h5><del>Cena: {{$jednaobjava->cena}} din</del></h5>
                <h3>Cena: {{$jednaobjava->nova_cena}} din</h3>
            @else
                <h3>Cena: {{$jednaobjava->cena}} din</h3>

            @endif
            <hr>
            <small>Napisan je {{$jednaobjava->created_at}}</small>
            <br>
            <br>
          <button onclick="dodajUKorpu('{{$jednaobjava->id}}','{{$jednaobjava->naziv}}', '{{$jednaobjava->slika}}','{{$jednaobjava->cena}}', '{{$jednaobjava->nova_cena}}')">Dodaj u korpu</button>


                <div class="btn-group btn-group-lg">
                    <a class="" href="{{ URL::previous() }}"><div class="btn btn-primary">Vrati se nazad!</div></a>
                {!!Form::open(['action'=>['PostsController@destroy',$jednaobjava->id_objave], 'method'=>'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                @if(Gate::check('admin_only', Auth::user()))
                {{Form::submit('Izbrisi objavu', ['class' => 'btn btn-outline-danger'])}}
                {!!Form::close()!!}
                <a class="" href="{{ url('posts/'.$jednaobjava->id_objave.'/edit') }}"><div class="btn btn-outline-primary">Izmeni objavu</div></a>
                @endif
                </div>


          </div>
      </div>




  </div>


 </div>
 </br>

@endsection
