@extends('master')
@section('title','edit')
@section('container')
    @if($car)
    <form method="post" action="{{url('/edit')}}">
        {!!csrf_field()!!}
        <input type="hidden" value={{$car->id}} name='id'/>
        <input type='text' class="form-control" id='brand' value={{$car->brand}} name='brand' placeholder='Brand'/>
        <br/>
        <input type='text' class="form-control" id='model' value={{$car->model}} name='model' placeholder='Model'/>
        <br/>
        <input type='number' class="form-control" id='doors' value={{$car->doors}} name='doors' placeholder='Doors'/>
        <br/>
        <input type='text' class="form-control" id='color' value={{$car->color}} name='color' placeholder='Color'/>
        <br/>
        <input type='number' class="form-control" id='kms' value={{$car->kms}} name='kms' placeholder='Kms'/>
        <br/>
        <input type='text' class="form-control" id='state' value={{$car->state}} name='state' placeholder='State'/>
        <br/>
        <button type="submit" class="btn btn-primary" id='button'>Send</button>    
    </form>
    @endif
@endsection