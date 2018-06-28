@extends('Header')

@section('title', 'RegateAdmin')

@section('content')

<section class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <div class="">
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
          <button type="submit" class="btn btn-primary">Enregistrer les informations de la régate</button>
        </div>
      </div>
    </form>
  </div>



</section>

<section class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
  <div class="regate-boats-container col-xs-6">
    <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>
            <a href="{{ url('/admin/regate/removeAllBoat') }}">Tout supprimer</a>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($regateBoats as $key => $regateBoat)
          @foreach ($boats as $index => $boat)
            @if ($regateBoat == $boat->bateau_id)
              <tr class="table-striped">
                <td>{{$boat->nom}}</td>
                <td>
                    <a href="{{ url('/admin/regate/removeBoat/'.$boat->bateau_id) }}" class="btn btn-danger">Supprimer</a>
                </td>
              </tr>
            @endif
          @endforeach
        @endforeach
      </tbody>
    </table>

  </div>

  <div class="col-xs-5">
    @if (!is_null($toBeAddedBoats) && count($toBeAddedBoats)>0)
        <div class="form-group">
          {{-- <form class="" action="/admin/regate/addBoat/{{ $boat->bateau_id }}" method="post">
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <input type="text" name="name" id="name" value="{{ $boat->nom }}" readonly>
            <input type="submit" name="" value="Ajouter">
          </form> --}}
          <table class="table">
            <thead>
              <tr>
                <th>Ajout de bateaux :</th>
                <th>
                  <a href="{{ url('/admin/regate/addAllBoat/') }}">Tout ajouter</a>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($toBeAddedBoats as $index => $boat)
                  <tr class="table-striped">
                    <td>{{$boat->nom}}</td>
                    <td>
                        <a href="{{ url('/admin/regate/addBoat/'.$boat->bateau_id) }}" class="btn btn-success">Ajouter</a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    @endif
  </div>

</section>
@endsection
