@extends('master')
@section('title','Add Car')
@section('container')
<form>
    {!!csrf_field()!!}
    <input type='text' id='brand' placeholder='Brand'/>
    <br/>
    <input type='text' id='model' placeholder='Model'/>
    <br/>
    <input type='text' id='doors' placeholder='Doors'/>
    <br/>
    <input type='text' id='color' placeholder='Color'/>
    <br/>
    <input type='text' id='kms' placeholder='Kms'/>
    <br/>
    <input type='text' id='state' placeholder='State'/>
    <br/>
    <button id='button'>Send</button>    
</form>
@endSection