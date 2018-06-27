@extends('Header')

@section('title', 'RegateAdmin')

@section('content')

  <section class="form-container">
    <form class="boat-form" action="/admin/regate/update/{{$regate->regate_id}}" method="post">
      <input name="_token" type="hidden" value="{{ csrf_token() }}" />
        <div class="">
          <label for="lastName">Nom: </label>
          <input type="text" name="name" value="{{ $regate->nom }}" id="name">
        </div>
        <div class="">
          <label for="firstName">Date: </label>
          <input type="date" name="date" value="{{ $regate->date }}" id="date">
        </div>
        <div class="">
          <label for="firstName">Club: </label>
          <input type="text" name="club" value="{{ $regate->club }}" id="club">
        </div>
        <div class="">
          <label for="firstName">Ligue: </label>
          <input type="text" name="ligue" value="{{ $regate->ligue }}" id="ligue">
        </div>
        <div class="">
          <label for="firstName">Jury: </label>
          <input type="text" name="jury" value="{{ $regate->jury }}" id="jury">
        </div>
        <div class="">
          <label for="firstName">Comite de course: </label>
          <input type="text" name="committee" value="{{ $regate->comiteDeCourse }}" id="committee">
        </div>
        <div class="">
          <label for="firstName">Securité: </label>
          <input type="text" name="security" value="{{ $regate->securite }}" id="security">
        </div>
        <div class="">
          <label for="firstName">Officier du jour: </label>
          <input type="text" name="officer" value="{{ $regate->officierDeJour }}" id="officer">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Mettre à jour la régate</button>
        </div>
    </form>
  </section>
@endsection
