@extends('layouts.masterComptable')
@section('content')
<!-- FAIRE LE FORMULAIRE -->
<div>
        <table class="table table-bordered table-striped table-responsive">
            @foreach($resultat as $lesEtats)
                <tr>
                  <td name = "user">
                      <input type="text" name="UserName" value="{{$lesEtats->nom}}" readonly="true" style='background:khaki'>
                      <input type="text" value="{{$lesEtats->prenom}}" readonly="true" style='background:khaki'>
                      <div style="text-align:right">
                          <a href = "{{url('/AfficheFiche')}}"><input type ="button" class="btn btn-primary" value="Afficher fiche"></a>
                      </div>
                    <ul>
                        <p>Mois clôturés :</p> 
                        <p style="margin-left:15px">{{$lesEtats->mois}}</p>
                    </ul>
                    <ul>
                        <p>Montant de la fiche</p>
                        <p style="margin-left:15px">{{$lesEtats->montantValide}}</p>
                    </ul>
                  </td> 
                </tr>
            @endforeach
        </table>
</div>
<!-- FERMER LE FORMULAIRE -->
@stop