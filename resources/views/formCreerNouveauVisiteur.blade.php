@extends('layouts.masterComptable')
@section('content')
{!! Form::open(['url' => 'creerNouveauVisiteur']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Création d'un visiteur</h1></center>
         @if ($message!="") 
            <h3 style="color: red">{{$message}}</h3>
         @endif
    <div class="form-horizontal">    
        
        <div class="form-group">
            <label class="col-md-3 control-label">Id : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="id" class="form-control" placeholder="Entrez l'id" maxlength="4" pattern="[a-zA-Z0-9]{1,4}" title="Doit avoir 4 caractères maximum.">
            </div>
        </div> 
        
        <div class="form-group">
            <label class="col-md-3 control-label">Nom : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="nom" class="form-control" placeholder="Entrez le nom" pattern="[A-Za-z]{1,50}" title="Seulement des caractères alphabétiques">
            </div>
        </div>         
        
        <div class="form-group">
            <label class="col-md-3 control-label">Prénom : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="prenom" class="form-control" placeholder="Entrez le prenom" pattern="[a-zA-Z]{1,50}" title="Seulement des caractères alphabétiques">
            </div>
        </div>                  
        
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="adresse" class="form-control" placeholder="Entrez l'adresse">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code Postal : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="codePostal" class="form-control" placeholder="Entrez le code postal"  maxlength="5" pattern="[0-9]{5}" title="Code de 5 chiffres">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Ville : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="ville" class="form-control" pattern="[a-zA-Z ]{1,50}" title="Seulement des caractères alphabétiques" placeholder="Entrez la ville">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Date d'embauche (annee-mois-jour) : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="dateEmbauche" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="Entrez la date d'embauche" title="format : annee-mois-jour | ex: 1998-11-27">
            </div>
        </div>         
        
        <div class="form-group">
            <label class="col-md-3 control-label">Numéro de téléphone : </label>
            <div class="col-md-6 col-md-3">
                <input required type="text" name="numTel" class="form-control" pattern="[0-9]{10}" placeholder="Entrez le numéro de téléphone" maxlength="10" title="Numéro de 10 chiffres commencant par un 0">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Email : </label>
            <div class="col-md-6 col-md-3">
                <input required type="email" name="email" class="form-control" pattern="[a-zA-Z0-9_.-]{0,100}@[a-zA-Z.]{0,50}.[a-zA-Z.]{0,50}" placeholder="Entrez l'email">
            </div>
        </div>  
        
        <div class="form-group">

            <div class="col-md-6 col-md-offset-3">
                 <!---<a href="{{ url('/modifLesInformations')}}"><button type="button" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-list"></span>Valider</button></a>--->
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

