@extends('layouts.masterComptable')
@section('content')

<div class="container">
    <div class="col-md-5">
        <div class="blanc">

        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Visiteur</th> 
                    <th style="width:20%">Période</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Etat</th> 
                    <th style="width:20%">Détails</th>  
                </tr>
            </thead>
            @foreach($ListeFiches as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->nom }} {{ $uneLigne->prenom }} </td>
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->nbJustificatifs }} </td> 
                <td> {{ $uneLigne->montantValide }} </td> 
                <td> {{ $uneLigne->idEtat }} </td> 
                <td style="text-align:center;"><a href="{{ url('/DetailsFicheVisiteur') }}/{{ $uneLigne->mois}}/{{ $uneLigne->idVisiteur }}">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
            </tr>
            @endforeach
        </table>

        @include('error')
    </div>
</div>
@stop

