@extends('layouts.masterComptable')
@section('content')

<div class="container">
    <div class="col-md-5">
        <div class="blanc">

            <h2>Visiteur : {{ $visiteur->nom }} {{ $visiteur->prenom }}</h2>
            
            <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Période</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Etat</th> 
                </tr>
            </thead>
            @foreach($FicheActuel as $fiche)
            <tr>   
                <td> {{ $fiche->mois }} </td> 
                <td> {{ $fiche->nbJustificatifs }} </td> 
                <td> {{ $fiche->montantValide }} </td> 
                <td> {{ $fiche->idEtat }} </td> 
            </tr>
            @endforeach
            </table>
            
            <h1>Liste Frais Forfait</h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Période</th> 
                    <th style="width:20%">Type de frais</th> 
                    <th style="width:20%">Etat</th>  
                </tr>
            </thead>
            @foreach($FicheForfait as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->idFraisForfait }} </td> 
                <td> {{ $uneLigne->quantite }} </td> 
            </tr>
            @endforeach
        </table>
            
            <h1>Liste Frais Hors Forfait</h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Période</th>
                    <th style="width:20%">Date</th>
                    <th style="width:20%">Libellé</th> 
                    <th style="width:20%">Montant</th>  
                </tr>
            </thead>
            @foreach($FicheHorsForfait as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->mois }} </td>
                <td> {{ $uneLigne->date }} </td> 
                <td> {{ $uneLigne->libelle }} </td> 
                <td> {{ $uneLigne->montant }} </td> 
            </tr>
            @endforeach
        </table>

            <a class="btn btn-primary" href="{{url('/SuivreFicheFrais')}}">Retour</a>
        @include('error')
    </div>
</div>
@stop

