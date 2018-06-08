@extends('master')
@section('title','show')
@section('container')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Brand</th>
        <th scope="col">Model</th>
        <th scope="col">Doors</th>
        <th scope="col">Color</th>
        <th scope="col">Kms</th>
        <th scope="col">State</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($carArray as $one)
        <tr>
            <td>{{$one->brand}}</td>
            <td>{{$one->model}}</td>
            <td>{{$one->doors}}</td>
            <td>{{$one->color->name}}</td>
            <td>{{$one->kms}}</td>
            <td>{{$one->state}}</td>
            {{-- <td><a href="cars/".{{$one->id}}."/edit">Edit</a></td> --}}

            <form action="{{url('/cars/'.$one->id.'/edit')}}" method="GET">
              {!!csrf_field()!!}
              <td><button type='submit' class="btn btn-primary">Edit</button></td>
            </form>

            {{-- <td><a href="{{url('/cars/'.$one->id.'/edit')}}">Edit</a></td> --}}
            
            <form action="{{url('/cars/'.$one->id)}}" method="POST">
              {!!csrf_field()!!}
              <input name="_method" type='hidden' value='DELETE'/>
              <td><button type='submit' class="btn btn-primary">Delete</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection