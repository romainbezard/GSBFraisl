@extends('layouts.masterComptable')
@section('content')
<div>
        <table class="table table-bordered table-striped table-responsive">
            @if(!empty($resultat))
                @foreach($resultat as $lesEtats)
                    <tr>
                      <td>
                          <input type="text" name="UserName"  value="{{$lesEtats->nom}}" readonly="true" style='background:khaki'>
                          <input type="text" name ="UserSurName" value="{{$lesEtats->prenom}}" readonly="true" style='background:khaki'>
                          <div style="text-align:right">
                              <a href="{{ url('/AfficheFicheUser')}}/{{$lesEtats->idVisiteur}}/{{$lesEtats->mois}}"><input type ="submit" class="btn btn-primary" value="Afficher fiche"></a>
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
            @else
                    <h1>Aucune fiche de frais à valider</h1>
            @endif
        </table>
</div>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@stop