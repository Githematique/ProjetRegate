@extends('Header')

@section('title', 'CrewAdmin')

@section('content')

<section class="form-container">
  <ul class="pager">
    <li class="previous"><a href="{{ url('/admin/crew/add') }}">Enregistrer un nouveau équipier</a></li>
  </ul>
  <table class="table">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <th>{{ $data->nom }}</th>
        <th>{{ $data->prenom }}</th>
        <th>{{ $data->role }}</th>
        <th>
          <a href="{{ url('/admin/crew/update/'.$data->equipier_id) }}" class="btn btn-primary">
	             Modifier
	        </a>
        </th>
        <th>
          <a href="{{ url('/admin/crew/delete/'.$data->equipier_id) }}" class="btn btn-operation btn-danger">
             Effacer
          </a>
        </th>

      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
