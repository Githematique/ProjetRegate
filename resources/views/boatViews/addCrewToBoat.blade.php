@extends('Header')

@section('title', 'BoatAdmin')

@section('content')

<section class="form-container addCrewToBoat-container">
  <div class="boat-container">
    <div class="">
      <strong>Nom</strong>: {{ $boat->nom }}
    </div>
    <div class="">
      <strong>Série</strong>: {{ $boat->serie }}
    </div>
    <div class="">
      <strong>Voile</strong>: {{ $boat->numVoile }}
    </div>
    <div class="">
      {{-- {{count($boat->equipiers)}} --}}
      @if (strlen($boat->equipiers) > 0 && count($equipiers) >= 1 )
        <strong>Equipiers</strong>:
        @foreach ( $equipiers as $key => $equipier)
          <div class="">
            <form class="" action="/admin/boat/removeCrew/{{ $boat->bateau_id }}/{{ $key }}" method="get">
              <input name="_token" type="hidden" value="{{ csrf_token() }}" />
              <label for="">{{ $equipier }}</label>
              <input type="submit" name="removeCrew" value="x">
            </form>

          </div>
        @endforeach
      @endif
      {{-- @foreach ($crews as $index => $crew)
        {{ $crew->nom }} <br/>
      @endforeach --}}
    </div>
  </div>
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
