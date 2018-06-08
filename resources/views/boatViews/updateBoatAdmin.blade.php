@extends('adminHeader')

@section('title', 'BoatAdmin')

@section('content')

<section class="form-container">
  <form class="boat-form" action="/admin/boat/update/{{ $boat->bateau_id }}" method="post">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="">
        <label for="serie">Série: </label>
        <input type="text" name="serie" value="{{ $boat->serie }}" id="serie">
      </div>
      <div class="">
        <label for="name">Nom: </label>
        <input type="text" name="name" value="{{ $boat->nom }}" id="name">
      </div>
      <div class="">
        <label for="numVoile">N° de voile: </label>
        <input type="number" name="numVoile" value="{{ $boat->numVoile }}" id="numVoile">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
  </form>
</section>
@endsection
