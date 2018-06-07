@extends('header')

@section('title', 'BoatAdmin')

@section('content')

<section class="form-container">
  <form class="boat-form" action="index.html" method="post">
      <div class="">
        <label for="serie">Série: </label>
        <input type="text" name="serie" value="" id="serie">
      </div>
      <div class="">
        <label for="name">Noom: </label>
        <input type="text" name="name" value="" id="name">
      </div>
      <div class="">
        <label for="nbVoile">N° de voile: </label>
        <input type="number" name="nbVoile" value="" id="nbVoile">

      </div>
  </form>
</section>
@endsection
