@extends('header')

@section('title', 'GestionAdmin')

@section('content')
<div class="row text-center">

  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">LISTE DES BATEAUX : </div>
        <div class="panel-body">
      <div class="form-group">
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
  </div>
 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">LISTE DES MEMBRES : </div>
        <div class="panel-body">
      <div class="form-group">
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
</div>
</div>

@endsection
