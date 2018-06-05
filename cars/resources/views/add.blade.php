@extends('master')
@section('title','Add Car')
@section('container')
<form method="post" action="{{url('/')}}">
    {!!csrf_field()!!}
    <input type='text' class="form-control" id='brand' name='brand' placeholder='Brand'/>
    <br/>
    <input type='text' class="form-control" id='model' name='model' placeholder='Model'/>
    <br/>
    <input type='number' class="form-control" id='doors' name='doors' placeholder='Doors'/>
    <br/>
    <input type='text' class="form-control" id='color' name='color' placeholder='Color'/>
    <br/>
    <input type='number' class="form-control" id='kms' name='kms' placeholder='Kms'/>
    <br/>
    <input type='text' class="form-control" id='state' name='state' placeholder='State'/>
    <br/>
    <button type="submit" class="btn btn-primary" id='button'>Send</button>    
</form>
@endSection