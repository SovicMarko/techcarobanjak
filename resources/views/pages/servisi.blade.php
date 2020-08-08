@extends('layouts.app') 
@section('sadrzaj') 
 
  <h1>Naše usluge</h1> 
  <p>Ovo je strana servisi</p> 
  @if(count($nizservisa) >0) 
   <ul> 
    @foreach($nizservisa as $niz) 
     <li>{{$niz}}</li> 
    @endforeach 
   </ul> 
     @endif 
@endsection 
 