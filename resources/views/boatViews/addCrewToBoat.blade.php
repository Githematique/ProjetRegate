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
      {{-- {{count($boat->equipiers)}} --}}
      @if (strlen($boat->equipiers) > 0 && count($equipiers) >= 1 )
        <strong>Equipiers </strong>:
        @foreach ( $equipiers as $key => $equipier)
          <div class="">
            <form class="" action="/admin/boat/removeCrew/{{ $boat->bateau_id }}/{{ $key }}" method="get">
              <input name="_token" type="hidden" value="{{ csrf_token() }}" />
              <label for="">{{$equipier }}</label>
              <input type="submit" name="removeCrew" value="x" title="Supprimer cet équipier">
            </form>

          </div>
        @endforeach
      @endif
      {{-- @foreach ($crews as $index => $crew)
        {{ $crew->nom }} <br/>
      @endforeach --}}
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
    @foreach ($crews as $index => $crew)
      <div class="">
        <form class="" action="/admin/boat/addCrew/{{ $boat->bateau_id }}/{{ $crew->equipier_id }}" method="post">
          <input name="_token" type="hidden" value="{{ csrf_token() }}" />
          <input type="text" name="firstName" id="firstName" value="{{ $crew->nom }}">
          <input type="text" name="lastName" id="lastName" value="{{ $crew->prenom }}">
          <input type="submit" name="" value="Ajouter">
        </form>

        {{-- <a href="{{url('/admin/boat/addCrew/'.$boat->bateau_id.'/'.$crew->equipier_id)}}">Ajouter</a> --}}
      </div>
    @endforeach
  </div>
          </div>
      </div>
  </div>
  {{-- <form class="boat-form" action="/admin/boat/add" method="post">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="">
        <label for="serie">Série: </label>
        <input type="text" name="serie" value="" id="serie">
      </div>
      <div class="">
        <label for="name">Noom: </label>
        <input type="text" name="name" value="" id="name">
      </div>
      <div class="">
        <label for="numVoile">N° de voile: </label>
        <input type="number" name="numVoile" value="" id="numVoile">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Ajouter un bateau</button>
      </div>
  </form> --}}
</section>

@endsection
