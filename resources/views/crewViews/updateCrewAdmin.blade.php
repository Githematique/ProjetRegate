@extends('Header')

@section('title', 'CrewAdmin')

@section('content')

<section class="form-container">
  <form class="boat-form" action="/admin/crew/update/{{ $crew->equipier_id }}" method="post">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="">
        <label for="serie">Nom: </label>
        <input type="text" name="lastName" value="{{ $crew->nom }}" id="lastName">
      </div>
      <div class="">
        <label for="name">Prenom: </label>
        <input type="text" name="firstName" value="{{ $crew->prenom }}" id="firstName">
      </div>
      <div class="">
        <label for="role">Role: </label>
        <select id="role" name="role">
          <option value="Voilier" {{old('role',$crew->role)=="Voilier"? 'selected':''}} >Voilier</option>
          <option value="Capitaine" {{old('role',$crew->role)=="Capitaine"? 'selected':''}}>Capitaine</option>
          <option value="TEst" {{old('role',$crew->role)=="TEst"? 'selected':''}}>TEst</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
  </form>
</section>
@endsection
