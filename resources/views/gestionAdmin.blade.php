@extends('header')

@section('title', 'GestionAdmin')

@section('content')
<section class="gestion-container">
  <div class="container">
    <h1> LISTE DES BATEAUX : </h1>
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
      <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <a class="btn btn-info" href="{{ url('/admin/boat/add') }}" role="button"> Ajouter un nouveau bateau</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <td>Nom</td>
          <td>Serie</td>
          <td>N° Voile</td>
          <td>Equipage</td>
          <td class="text-right">Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach($boats as $boat)
        <tr>
          <td>{{ $boat->nom }}</td>
          <td>{{ $boat->serie }}</td>
          <td>{{ $boat->numVoile }}</td>
          <td>
            <a href="{{ url('/admin/boat/addCrew/'.$boat->bateau_id) }}" title="">
                 Gérer l'équipage
            </a>
          </td>
          <td class="text-right">

            <a href="{{ url('/admin/boat/update/'.$boat->bateau_id) }}" title='Editer'><i class="fa fa-edit"></i>
  	        </a>
            <a href="{{ url('/admin/boat/delete/'.$boat->bateau_id) }}" title='Supprimer' style="margin-left: 20px;"><i class="fa fa-trash" style="color: #ff0000;"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>

  <div class="container">
    <h1> LISTE DES MEMBRES : </h1>
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 centered">
      <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
      </div>
      <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a class="btn btn-info" href="{{ url('/admin/crew/add') }}" role="button"> Ajouter un nouveau membre</a>
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Role</td>
            <td class="text-right">Actions</td>
          </tr>
        </thead>
        <tbody>
          @foreach($crews as $crew)
          <tr>
            <td>{{ $crew->nom }}</td>
            <td>{{ $crew->prenom }}</td>
            <td>{{ $crew->role }}</td>
            <td class="text-right">
              <a href="{{ url('/admin/crew/update/'.$crew->equipier_id) }}" title='Editer'><i class="fa fa-edit"></i>
    	        </a>
              <a href="{{ url('/admin/crew/delete/'.$crew->equipier_id) }}" title='Supprimer' style="margin-left: 20px;"><i class="fa fa-trash" style="color: #ff0000;"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection
