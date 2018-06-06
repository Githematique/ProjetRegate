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
<nav id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="#home">Projet Régate</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse navbar-menubuilder">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#administration">Administration</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="blockStatus col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
    <h1 class="title">Block Status de la regate</h1>
    <div>&larr; Affiche le status actuel de la regate  &rarr;</div>
    <h2 class="subheading" data-breakpoint></h2>
  </div>
  <div class="flex">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary">Apercu</button>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary">Départ</button>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary">Retard</button>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary">Rappel general</button>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary">Rappel individuel</button>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <button type="button" class="btn btn-primary">Annulation</button>
    </div>   
</div> 
</div>

    </body>
</html>
