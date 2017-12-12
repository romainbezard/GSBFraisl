@extends('layouts.masterComptable')
@section('content')
{!! Form::open(['url' => '/SuivreFicheFrais']) !!}  
<div class="container">
    
    
    <div class="col-md-5">
        <div class="blanc">
            
                <select name="Visiteur" id="Visiteur">
                    @foreach($Liste as $uneLigne)
                    <option value="{{$uneLigne->id}}">
                        {{$uneLigne->nom}} {{ $uneLigne->prenom}}
                    </option>
                    @endforeach
                </select>
                <input type='submit' value ="Valider"/>
            {!! Form::close() !!}
            <h1>Liste des frais du visiteur {{$idVisiteur}}</h1>
        </div>
        @if( $idVisiteur != '') 
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Période</th> 
                    <th style="width:20%">Nb justificatifs</th> 
                    <th style="width:20%">Montant valide</th> 
                    <th style="width:20%">Etat</th> 
                    <th style="width:20%">Détails</th>  
                </tr>
            </thead>
            @foreach($ListeFiches as $uneLigne)
            <tr>   
                <td> {{ $uneLigne->mois }} </td> 
                <td> {{ $uneLigne->nbJustificatifs }} </td> 
                <td> {{ $uneLigne->montantValide }} </td> 
                <td> {{ $uneLigne->idEtat }} </td> 
                <td style="text-align:center;"><a href="{{ url('/DetailsFrais') }}/{{ $unFrais->id}}">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
            </tr>
            @endforeach
        </table>
        @endif
        @include('error')
    </div>
</div>
@stop

