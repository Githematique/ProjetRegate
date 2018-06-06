<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="container">
  <div class="col-6 text-center" style="background-color: blue; margin-top: 10%;">
    <h1 class="title">Block Status de la regate</h1>
    <div>&larr; Affiche le status actuel de la regate  &rarr;</div>
    <h2 class="subheading" data-breakpoint></h2>
  </div>
  <div class="flex">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <button type="button" class="btn btn-primary">Apercu</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <button type="button" class="btn btn-primary">Depart</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <button type="button" class="btn btn-primary">Retard</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <button type="button" class="btn btn-primary">Rappel general</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <button type="button" class="btn btn-primary">Rappel individuel</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <button type="button" class="btn btn-primary">Annulation</button>
    </div>
    
</div>
    </body>
</html>
