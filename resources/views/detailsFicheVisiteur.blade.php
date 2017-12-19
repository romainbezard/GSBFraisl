@extends('layouts.masterComptable')
@section('content')

<div class="container">
    <div class="col-md-5">
        <div class="blanc">

            <h1>Liste Frais Forfait</h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Visiteur</th> 
                    <th style="width:20%">Période</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Etat</th>  
                </tr>
            </thead>
            @foreach($FicheForfait as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->nom }} {{ $uneLigne->prenom }} </td>
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->nbJustificatifs }} </td> 
                <td> {{ $uneLigne->montantValide }} </td> 
                <td> {{ $uneLigne->idEtat }} </td> 
            </tr>
            @endforeach
        </table>
            
            <h1>Liste Frais Hors Forfait</h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Visiteur</th> 
                    <th style="width:20%">Période</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Etat</th>  
                </tr>
            </thead>
            @foreach($FicheHorsForfait as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->nom }} {{ $uneLigne->prenom }} </td>
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->nbJustificatifs }} </td> 
                <td> {{ $uneLigne->montantValide }} </td> 
                <td> {{ $uneLigne->idEtat }} </td> 
            </tr>
            @endforeach
        </table>

            <a href="{{url('/SuivreFicheFrais')}}">Retour</a>
        @include('error')
    </div>
</div>
@stop

