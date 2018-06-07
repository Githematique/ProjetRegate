@extends('header')

@section('title', 'BoatAdmin')

@section('content')

<section class="form-container">
  <ul class="pager">
    <li class="previous"><a href="{{ url('/admin/boat/add') }}">Enregistrer un nouveau bateau</a></li>
  </ul>
  <table class="table">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Serie</th>
        <th>N° Voile</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <th>{{ $data->nom }}</th>
        <th>{{ $data->serie }}</th>
        <th>{{ $data->numVoile }}</th>
        {{-- <th>
          <a href="{{ url('deleteNews/'.$data->id) }}" class="btn btn-operation btn-danger">
	             Effacer
	        </a>
        </th> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
