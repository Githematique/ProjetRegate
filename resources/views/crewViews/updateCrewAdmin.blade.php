@extends('Header')

@section('title', 'CrewAdmin')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <h1>Modification :</h1>
  <form class="boat-form" action="/admin/crew/update/{{ $crew->equipier_id }}" method="post" style="margin-top: 20px;">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
    <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <label for="lastName">Nom: </label>
      <input type="text" class="form-control" name="lastName" value="{{ $crew->nom }}" id="lastName" required>
    </div>
    <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <label for="firstName">Prenom: </label>
      <input type="text" class="form-control" name="firstName" value="{{ $crew->prenom }}" id="firstName" required>
    </div>
    <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <label for="role">Role: </label>
      <select id="role" class="form-control" name="role">
        <option value="Voilier" {{old('role',$crew->role)=="Voilier"? 'selected':''}} >Voilier</option>
        <option value="Capitaine" {{old('role',$crew->role)=="Capitaine"? 'selected':''}}>Capitaine</option>
        <option value="TEst" {{old('role',$crew->role)=="TEst"? 'selected':''}}>TEst</option>
      </select>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
    </div>
  </form>
</div>
@endsection
