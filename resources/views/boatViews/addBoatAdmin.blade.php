@extends('Header')

@section('title', 'BoatAdmin')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <h1>Ajout d'un nouveau bateau :</h1>
  <form class="boat-form" action="/admin/boat/add" method="post" style="margin-top: 20px;">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="form-group col-xs-3 col-sm-3 col-md-3  col-lg-3">
        <label for="serie">Série: </label>
        <select id="serie" class="form-control" name="serie" required>
          @foreach ($series as $key => $serie)
            <option value="{{$serie->type}}">{{$serie->type}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-xs-3 col-sm-3 col-md-3  col-lg-3">
        <label for="name">Nom: </label>
        <input type="text" class="form-control" name="name" value="" id="name" required>
      </div>
      <div class="form-group col-xs-3 col-sm-3 col-md-3  col-lg-3">
        <label for="numVoile">N° de voile: </label>
        <input type="number" class="form-control" name="numVoile" value="" id="numVoile" required>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ajouter un bateau</button>
        </div>
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a class="btn btn-info" href="{{ url('/admin/gestion') }}" role="button"> Annuler</a>
      </div>
  </form>
</div>
@endsection
