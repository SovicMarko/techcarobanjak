@extends('layouts.admin')

@section('naslov')
    <h1>Nova objava</h1>
@endsection

@section('sadrzaj')
    <div class="card p-3 card-unos">
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'row']) !!}
         <div class="col col-md-6">
           <div class="form-group">
               {{Form::label('naslovobjave', 'Naslov')}}
               {{Form::text('naslovobjave', ' ', ['class' =>'form-control', 'placeholder'  =>'Upisi naslov'])}}
              </div>

              <div class="form-group">
               {{Form::label('cena', 'Cena')}}
               {{Form::text('cena', ' ', ['class' =>'form-control', 'placeholder'  =>'Upisi nesto u body'])}}
           </div>

           <div class="form-group">
               {{Form::label('popust', 'Popust')}}
               {{Form::text('popust', ' ', ['class' =>'form-control', 'placeholder'  =>'Upisi nesto u body'])}}
           </div>
           <div class="form-group">
               {!! Form::Label('id_kategorije', 'Kategorija:') !!}
               <select class="form-control" name="id_kategorije">
                 @foreach($kategorije as $kategorija)
                   <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
                 @endforeach
               </select>
           </div>
        </div>

        <div class="col col-md-6">
           <div class="form-group">
               {{Form::label('telo', 'Opis')}}
               {{Form::textarea('telo', ' ', ['class' =>'form-control', 'id' => 'summernote', 'placeholder'  =>'Upisi nesto u body'])}}
           </div>
           <div class="form-group lm-20">
               {{Form::label('image', 'Slika')}}
               {{Form::file('image', ['class' =>'py-2'])}}

               {{Form::label('izdvojeno', 'Izdvojeno')}}
               {{Form::checkbox('izdvojeno', 'yes', false, ['class' => 'veliko-check'])}}
           </div>
       </div>

       <hr> <br>
       {{Form::submit('Kreiraj objavu!', ['class'=>'btn btn-primary m-3'] )}}

    {!! Form::close() !!}
    </div>
@endsection
