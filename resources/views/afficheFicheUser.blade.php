@extends('layouts.masterComptable')
@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <h1>Fiche à validé</h1>
        <tr>
            <td>Visiteur</td>
            <td>Periode</td>
            <td>Nb justificatifs</td>
            <td>Montant valide</td>
            <td>Date modification</td>
        </tr>
        <tr>
            <td>{{$id}}</td>
            <td>{{$mois}}</td>
            <td>{{$nbJust}}</td>
            <td>{{$montantValide}}€</td>
            <td>{{$dateModif}}</td>
        </tr>
    </table>
    <table class="table table-bordered table-striped table-responsive">
        <h1>Liste des frais forfait</h1>
        <tr>
            <td>Identtifiant</td>
            <td>Quantite</td>
        </tr>
        @foreach($resultat as $lesInfos)
        <tr>
            <td>{{$lesInfos->idFraisForfait}}</td>
            <td>{{$lesInfos->quantite}}<td>
            <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span>
        </tr>
        @endforeach
    </table>
    
    <table class="table table-bordered table-striped table-responsive">
        <h1>Liste des frais hors forfait</h1>
        <tr>
            <td>Libellé</td>
            <td>Date</td>
            <td>Montant</td>
            <td>Supprimer</td>
        </tr>
        @foreach($ficheHf as $lesHorsForf)
        <tr>
        <p hidden="true">{{$total += $lesHorsForf->montant}}</p>
            <td>{{$lesHorsForf->libelle}}</td>
            <td>{{$lesHorsForf->date}}</td>
            <td>{{$lesHorsForf->montant}}€</td>
            <td><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Voir"></span></td>
        </tr>
        @endforeach
        <tr>
            <td>Montant total : </td>
            <td></td>
            <td>{{$total}}€</td>
        </tr>
    </table>
<div style="text-align: center;">
    <a href="{{ url('/ValideFiche')}}/{{$id}}/{{$mois}}"><button class="btn btn-primary" >Valider</button></a>
</div>
@stop