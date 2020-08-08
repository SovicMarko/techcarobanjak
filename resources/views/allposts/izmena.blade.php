@extends('layouts.admin')
@section('naslov')
    <h1>Izmena objave</h1>
@endsection
@section('sadrzaj')
<div class="card p-3 card-unos">
 {!! Form::open(['action' => ['PostsController@update',$jednaobjava->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class'=>'row']) !!}
    <div class="col col-md-6">
        <div class="form-group">
        {{Form::label('naslovobjave', 'Naslov:')}}
        {{Form::text('naslovobjave', $jednaobjava->title, ['class' =>'form-control', 'placeholder'  =>'Upisi naslov', ])}}
        </div>

        <div class="form-group">
            {{Form::label('cena', 'Cena')}}
            {{Form::text('cena', $jednaobjava->cena, ['class' =>'form-control', 'placeholder'  =>'Upisi nesto u body'])}}
        </div>

        <div class="form-group">
            {{Form::label('popust', 'Popust')}}
            {{Form::text('popust', $jednaobjava->popust, ['class' =>'form-control', 'placeholder'  =>'Upisi nesto u body'])}}
        </div>


        <div class="form-group">
            {!! Form::Label('id_kategorije', 'Kategorija:') !!}
            <select class="form-control" name="id_kategorije">
            @foreach($kategorije as $kategorija)
                @if($jednaobjava->id_kategorije == $kategorija->id)
                <option value="{{$kategorija->id}}" selected>{{$kategorija->naziv}}</option>
                @else
                <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
                @endif
            @endforeach
            </select>
        </div>

    </div>
    <div class="col col-md-6">

        <div class="form-group">
            {{Form::label('telo', 'Objava:')}}
            {{Form::textarea('telo',$jednaobjava->body, ['class' =>'form-control', 'id'  =>'summernote'])}}
        </div>
        <div class="form-group">
            {{Form::label('image', 'Slika')}}
            {{Form::file('image', ['class' =>'py-2'])}}
            {{Form::label('izdvojeno', 'Izdvojeno')}}
            {{Form::checkbox('izdvojeno', 'yes', $jednaobjava->izdvojeno)}}
        </div>
    </div>

    <hr>
    {{Form::submit('Potvrdi izmene', ['class'=>'btn btn-primary m-3'] )}}
 {!! Form::close() !!}
</div>
@endsection

