@extends('Header')

@section('title', 'SerieAdmin')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <h1>Modification :</h1>
  <form class="boat-form" action="/admin/serie/update/{{ $serie->id }}" method="post" style="margin-top: 20px;">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <label for="serie">Type: </label>
        <input type="text" class="form-control" name="type" value="{{ $serie->type }}" id="type" required>
      </div>
      <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <label for="name">Coefficient: </label>
        <input type="text" class="form-control" name="coefficient" value="{{ $serie->coeff }}" id="coefficient" required>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a class="btn btn-info" href="{{ url('/admin/gestion') }}" role="button"> Annuler</a>
      </div>
  </form>
</div>
@endsection
