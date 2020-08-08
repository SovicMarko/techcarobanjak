@extends('layouts.admin')
@section('naslov')
<h1>Pregled korisnika</h1>
@endsection
@section('sadrzaj')
 @if(count($korisnici)>0)
 <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>br</th>
        <th>ime</th>
        <th>email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($korisnici as $korisnik)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$korisnik->name}}</td>
            <td>{{$korisnik->email}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <hr>
  @else
   <p>
    No Posts found
   </p>
  @endif
 @endsection
