@extends('Header')

@section('title', 'CrewAdmin')

@section('content')

<section class="form-container">
  <form class="boat-form" action="/admin/crew/add" method="post">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="">
        <label for="lastName">Nom: </label>
        <input type="text" name="lastName" value="" id="lastName">
      </div>
      <div class="">
        <label for="firstName">Prénom: </label>
        <input type="text" name="firstName" value="" id="firstName">
      </div>
      <div class="">
        <label for="role">Role: </label>
        <select id="role" name="role">
          <option value="Voilier">Voilier</option>
          <option value="Capitaine" selected>Capitaine</option>
          <option value="TEst">TEst</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Ajouter un équipier</button>
      </div>
  </form>
</section>
@endsection
