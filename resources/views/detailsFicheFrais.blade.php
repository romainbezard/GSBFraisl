@extends('layouts.masterComptable')
@section('content')

<div class="container">
    <div class="col-md-5">
        <div class="blanc">

            <h1> Ligne de Frais Forfait </h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Type</th> 
                    <th style="width:20%">Quantite</th> 
                     
                </tr>
            </thead>
            @foreach($ListeFiches as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->nom }} {{ $uneLigne->prenom }} </td>
                <td> {{ $uneLigne->mois }} </td>  
            </tr>
            @endforeach
        </table>

            <h1> Ligne de Frais Hors Forfait </h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Libelle</th> 
                    <th style="width:20%">Date</th> 
                    <th style="width:20%">Montant</th> 

                </tr>
            </thead>
            @foreach($ListeFiches as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->nom }} {{ $uneLigne->prenom }} </td>
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->nbJustificatifs }} </td> 

            </tr>
            @endforeach
        </table>
            
            <h1> Ligne de Frais Hors Forfait Suprimmées </h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Libelle</th> 
                    <th style="width:20%">Date</th> 
                    <th style="width:20%">Montant</th> 
                    <th style="width:20%">Motif</th>
                </tr>
            </thead>
            @foreach($ListeFiches as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->nom }} {{ $uneLigne->prenom }} </td>
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->nbJustificatifs }} </td> 
                <td> {{ $uneLigne->montantValide }} </td> 

            </tr>
            @endforeach
        </table>
            
        @include('error')
    </div>
</div>
@stop

