@extends('layouts.admin')
@section('naslov')
<h1>Pregled objava</h1>
@endsection
@section('sadrzaj')

 @if(count($postovi)>0)
 <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>br</th>
        <th>Naslov</th>
        <th>Slika</th>
        <th>Cena</th>
        <th>Istaknuto</th>
        <th>Datum objave</th>
      </tr>
    </thead>
    <tbody>

      @foreach($postovi as $nasipostovi)
        <tr>
            <td>{{$nasipostovi->id}}</td>
            <td><a href="posts/{{$nasipostovi->id}}">{{$nasipostovi->title}}</a></td>
            <td><img src="{{ asset('storage/' . $nasipostovi->image )}}" width="50px"></td>
            <td>{{$nasipostovi->cena}}</td>

            @if($nasipostovi->izdvojeno == 1)
            <td class="text-success pl-4">da</td>
            @else
            <td class="text-danger pl-4">ne</td>
            @endif
            <td>{{$nasipostovi->created_at}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
  <hr>
   {{$postovi->links()}}

  @else
   <p>
    No Posts found
   </p>
  @endif
 @endsection
