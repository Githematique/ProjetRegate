@extends('Header')

@section('title', 'RegateAdmin')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <h1>Parametrage de la régate :</h1>
    <form class="boat-form" action="/admin/regate/update/{{$regate->regate_id}}" method="post">
      <input name="_token" type="hidden" value="{{ csrf_token() }}" />
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="lastName">Nom: </label>
          <input type="text" class="form-control" name="name" value="{{ $regate->nom }}" id="name">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Date: </label>
          <input type="date" class="form-control" name="date" value="{{ $regate->date }}" id="date">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Club: </label>
          <input type="text" class="form-control" name="club" value="{{ $regate->club }}" id="club">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Ligue: </label>
          <input type="text" class="form-control" name="ligue" value="{{ $regate->ligue }}" id="ligue">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Jury: </label>
          <input type="text" class="form-control" name="jury" value="{{ $regate->jury }}" id="jury">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Comite de course: </label>
          <input type="text" class="form-control" name="committee" value="{{ $regate->comiteDeCourse }}" id="committee">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Securité: </label>
          <input type="text" class="form-control" name="security" value="{{ $regate->securite }}" id="security">
        </div>
        <div class="form-group col-xs-4 col-sm-4 col-md-4  col-lg-4">
          <label for="firstName">Officier du jour: </label>
          <input type="text" class="form-control" name="officer" value="{{ $regate->officierDeJour }}" id="officer">
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer les paramettres de la régate</button>
          </div>
        </div>
    </form>
  </section>
@endsection
