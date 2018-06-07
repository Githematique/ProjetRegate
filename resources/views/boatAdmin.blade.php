@extends('header')

@section('title', 'BoatAdmin')

@section('content')

<section class="form-container">
  <form class="boat-form" action="/admin/addBoat" method="post">
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
        <button type="submit" class="btn btn-primary">Ajouter une actu</button>
      </div>
  </form>
</section>
@endsection
