@extends('Header')

@section('title', 'CrewAdmin')

@section('content')

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
        @foreach($datas as $data)
        <tr>
          <td>{{ $data->nom }}</td>
          <td>{{ $data->prenom }}</td>
          <td>{{ $data->role }}</td>
          <td class="text-right">
            <a href="{{ url('/admin/crew/update/'.$data->equipier_id) }}" title='Editer'><i class="fa fa-edit"></i> 
  	        </a>
            <a href="{{ url('/admin/crew/delete/'.$data->equipier_id) }}" title='Supprimer' style="margin-left: 20px;"><i class="fa fa-trash" style="color: #ff0000;"></i> 
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
