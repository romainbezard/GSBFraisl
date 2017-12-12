@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'ChangeInformations']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Modification des informations</h1></center>
    <div class="form-horizontal">     
        <div class="form-group">
        @foreach($ligne as $uneLigne)
            <label class="col-md-3 control-label">Adresse : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="adresse" class="form-control" placeholder="{{$uneLigne->adresse}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code Postal : </label>
            <div class="col-md-6 col-md-3">
                <input type="number" name="codePostal" class="form-control" placeholder="{{$uneLigne->codePostal}}"  maxlength="5" pattern="[0-9]{,5}">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Ville : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="ville" class="form-control" placeholder="{{$uneLigne->ville}}">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Email : </label>
            <div class="col-md-6 col-md-3">
                <input type="email" name="email" class="form-control" placeholder="{{$uneLigne->email}}">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Numéro de téléphone : </label>
            <div class="col-md-6 col-md-3">
                <input type="number" name="numTel" class="form-control" placeholder="{{$uneLigne->NumeroDeTelephone}}" maxlength="10">
            </div>
        </div>
       
        <div class="form-group">
        @endforeach
            <div class="col-md-6 col-md-offset-3">
                 <!---<a href="{{ url('/modifLesInformations')}}"><button type="button" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-list"></span>Valider</button></a>--->
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
         @if ($message!="") 
            <h3>{{$message}}</h3>
         @endif
            @include('error')
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

