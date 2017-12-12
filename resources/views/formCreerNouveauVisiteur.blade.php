@extends('layouts.masterComptable')
@section('content')
{!! Form::open(['url' => 'creerNouveauVisiteur']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Création d'un visiteur</h1></center>
    <div class="form-horizontal">    
        
        <div class="form-group">
            <label class="col-md-3 control-label">Id : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="id" class="form-control" placeholder="Entrez l'id" maxlength="4" title="Doit avoir 4 caractères maximum.">
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-md-3 control-label">Nom : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="nom" class="form-control" placeholder="Entrez le nom">
            </div>
        </div>         
        
        <div class="form-group">
            <label class="col-md-3 control-label">Prénom : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="prenom" class="form-control" placeholder="Entrez le prenom">
            </div>
        </div>                  
        
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="adresse" class="form-control" placeholder="Entrez l'adresse">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code Postal : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="codePostal" class="form-control" placeholder="Entrez le code postal"  maxlength="5" pattern="[0-9]{5}" title="Code de 5 chiffres">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Ville : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="ville" class="form-control" placeholder="Entrez la ville">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Date d'embauche (format : annee-mois-jour) : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="dateEmbauche" class="form-control" placeholder="Entrez la date d'embauche">
            </div>
        </div>         
        
        <div class="form-group">
            <label class="col-md-3 control-label">Numéro de téléphone : </label>
            <div class="col-md-6 col-md-3">
                <input type="number" name="numTel" class="form-control" placeholder="Entrez le numéro de téléphone" maxlength="10">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Email : </label>
            <div class="col-md-6 col-md-3">
                <input type="email" name="email" class="form-control" placeholder="Entrez l'email">
            </div>
        </div>  
        
        <div class="form-group">

            <div class="col-md-6 col-md-offset-3">
                 <!---<a href="{{ url('/modifLesInformations')}}"><button type="button" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-list"></span>Valider</button></a>--->
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
         @if ($message!="") 
            <h3>{{$message}}</h3>
         @endif
        <div class="col-md-6 col-md-offset-3">
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

