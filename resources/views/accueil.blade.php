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
  <div class="blockStatus col-6 text-center">
    <img class="gif" src="https://media.giphy.com/media/3o7aCVTfelG4XSbv3y/giphy.gif" alt="gif">
  </div>   

  <div class="col-6">
      <div class="panel panel-default">
        <div class="panel-heading">Suivit du visuel lumineux/Sonor en cours :</div>
        <div class="panel-body">
<i class="led1"></i>
<i class="led2"></i>
<i class="led3"></i>
<i class="led4"></i>
<i class="fas fa-anchor"></i><i class="fas fa-cogs"></i><i class="far fa-life-ring"></i>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
</div>
    </body>
</html>
