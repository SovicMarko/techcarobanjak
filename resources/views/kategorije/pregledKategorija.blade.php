@extends('layouts.admin')
@section('naslov')
<h1>Pregled Kategorija</h1>
@endsection
@section('sadrzaj')
    @if(count($kategorije)>0)
    <div class="row">
     <div class="col col-xs-12 col-md-6">
        <table class="table bg-light">
            <thead>
              <tr>
                <th>Naziv</th>
                <th>Opis</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
        @foreach($kategorije as $kategorija)
              <tr>
                <td> {{$kategorija->naziv}} </td>
                <td> {{$kategorija->opis}} </td>
                <td>
                    {!!Form::open(['action'=>['KategorijeController@destroy',$kategorija->id], 'method'=>'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{ Form::button('X', array('class'=>'btn btn-md btn-outline-danger', 'type'=>'submit')) }}
                    {!!Form::close()!!}
                </td>
              </tr>

        @endforeach
        </tbody>
    </table>
        {{$kategorije->links()}}
    </div>
       @else
            <div class="col col-xs-12 col-md-6">
                <p>Nema unetih kategorija</p>
            </div>
       @endif

     <div class="col col-xs-12 col-md-6">
        <h1>Nova kategorija</h1>
        {!! Form::open(['action' => 'KategorijeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
            {{Form::label('naziv', 'Naziv kategorije')}}
            {{Form::text('naziv', ' ', ['class' =>'form-control', 'placeholder'  =>'Upisi naslov'])}}
            </div>
            <div class="form-group">
            {{Form::label('opis', 'Opis kategorije')}}
            {{Form::textarea('opis', ' ', ['class' =>'form-control kategorija-opis', 'placeholder'  =>'Upisi nesto u body'])}}
            </div>
            <div class="form-group d-flex flex-column">
            {{Form::label('image', 'Slika')}}
            {{Form::file('image', ['class' =>'py-2'])}}
            </div>
            {{Form::submit('Kreiraj objavu!', ['class'=>'btn btn-primary'] )}}
            {!! Form::close() !!}
     </div>
    </div>
 @endsection
