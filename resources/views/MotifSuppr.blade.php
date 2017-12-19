@extends('layouts.masterComptable')
@section('content')
<div>
        <table class="table table-bordered table-striped table-responsive">
        <h1>Mettre motif de suprresion</h1>
        <tr>
            <td>Visiteur</td>
            <td>Date</td>
            <td>Libelle</td>
            <td>Motif</td>
        </tr>
        <tr>
            {!! Form::open(['url' => 'SupprimerFicheFrais'])  !!}
            <td><input type="text" name = 'id' value="{{$id}}" readonly="true"></td>
            <td><input type="text" name="date" value="{{$date}}" readonly="true"></td>
            <td><input type="text" size = "32px" name = "libelle" value="{{$libelle}}" readonly="true"</td>
            <td><input type="text" name="motif" pattern="[a-zA-ZÀ-ÿ ]{0,500}" title="Mettre un motif valable"></td>
        </tr>
    </table>
        <button class="btn btn-primary" type="submit">Valider</button>
        {!! Form::close() !!}
        <a href="{{ url('/AnnulerMotif')}}"><button class="btn btn-primary">Annuler</button></a>
    
</div>
@stop