@extends('Header')

@section('title', 'CrewAdmin')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <h1>Informations du nouveau membre :</h1>
  <form class="boat-form" action="/admin/crew/add" method="post" style="margin-top: 20px;">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="form-group col-xs-3 col-sm-3 col-md-3  col-lg-3">
        <label for="lastName">Nom: </label>
        <input type="text" class="form-control" name="lastName" value="" id="lastName" required>
      </div>
      <div class="form-group col-xs-3 col-sm-3 col-md-3  col-lg-3">
        <label for="firstName">Prénom: </label>
        <input type="text" class="form-control" name="firstName" value="" id="firstName" required>
      </div>
      <div class="form-group col-xs-3 col-sm-3 col-md-3  col-lg-3">
        <label for="role">Role: </label>
        <select id="role" class="form-control" name="role">
          <option value="Voilier">Voilier</option>
          <option value="Capitaine" selected>Capitaine</option>
          <option value="TEst">TEst</option>
        </select>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group ">
          <button type="submit" class="btn btn-primary">Ajouter ce membre</button>
        </div>
      </div>
  </form>
</div>
@endsection
