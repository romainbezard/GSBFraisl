@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'ChangePassword']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Modification de mot de passe</h1></center>
        @if ($message!="") 
            <h3 style="color: red">{{$message}}</h3>
        @endif
    <div class="form-horizontal">     
        <div class="form-group">
            <label class="col-md-3 control-label">Mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="pwd" ng-model="pwd" class="form-control" placeholder="Votre mot de passe" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Nouveau mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="npwd" ng-model="pwd" class="form-control" pattern="[a-zA-Z0-9_;-.]{5,50}" placeholder="Votre mot de passe" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Resaissir mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="rnpwd" ng-model="pwd" class="form-control" placeholder="Votre mot de passe" required>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('error')
            
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

