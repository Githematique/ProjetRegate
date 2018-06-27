@extends('Header')

@section('title', 'BoatAdmin')

@section('content')

<div class="row text-center">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">Informations du bateau :</div>
      <div class="panel-body">
        <div class="boat-container">
          <div class="form-group">
            <strong>Nom </strong>: {{ $boat->nom }}
          </div>
          <div class="form-group">
            <strong>Série </strong>: {{ $boat->serie }}
          </div>
          <div class="form-group">
            <strong>Voile </strong>: {{ $boat->numVoile }}
          </div>
          <div class="form-group">
            @if (strlen($boat->equipiers) > 0 && count($equipiers) >= 1 )
            <strong>Equipiers </strong>:
            @foreach ( $equipiers as $key => $equipier)
            <div class="form-group">
              <form class="" action="/admin/boat/removeCrew/{{ $boat->bateau_id }}/{{ $key }}" method="get">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <label for="">{{$equipier }}</label>
                <input type="submit" name="removeCrew" value="x" title="Supprimer cet équipier">
              </form>

            </div>

            @endforeach
            @endif  
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <a class="btn btn-info" href="{{ url('/admin/gestion') }}" role="button"> Enregistrer / Retour</a>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">Liste des équipiers disponible :</div>
      <div class="panel-body">
        <div class="crews-container">
          @if (!is_null($crews))
            @foreach ($crews as $index => $crew)
              @if ($crew->occupe == false)
                <div class="form-group">
                  <form class="" action="/admin/boat/addCrew/{{ $boat->bateau_id }}/{{ $crew->equipier_id }}" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                    <input type="text" name="firstName" id="firstName" value="{{ $crew->nom }}">
                    <input type="text" name="lastName" id="lastName" value="{{ $crew->prenom }}">
                    <input type="submit" name="" value="Ajouter">
                  </form>
                </div>
              @endif
            @endforeach
          @endif

        </div>
      </div>
    </div>
  </div>

  </section>

  @endsection
