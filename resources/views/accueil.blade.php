@extends('header')

@section('title', 'Home')

@section('content')

  <div class="container">
    <div class="blockStatus col-6 text-center">
<!--       <img class="gif" src="https://media.giphy.com/media/3o7aCVTfelG4XSbv3y/giphy.gif" alt="gif">
 -->    </div>

    <div class="col-6">
      <div class="panel panel-default">
        <div class="panel-heading">Suivi du visuel en cours :</div>
        <div class="panel-body">
          <i class="led1"></i>
          <i class="led2"></i>
          <i class="led3"></i>
          <i class="led4"></i>
          <i class="fas fa-volume-down petitSon"></i>
          <i class="fas fa-volume-up grandSon"></i>
        </div>
      </div>
    </div>
<form method="get" action="/ledOn" enctype="multipart/form-data">
        
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  <div class="flex">
	    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	      <button type="submit" class="btn apercu" name="apercu">Apercu</button>
	    </div>
	    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	      <button type="submit" class="btn depart" name="depart">Départ</button>
	    </div>
	    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	      <button type="submit" class="btn rappel_g" name="rappel_g">Rappel general</button>
	    </div>
	    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	      <button type="submit" class="btn rappel_i" name="rappel_i">Rappel individuel</button>
	    </div>
	    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	      <button type="submit" class="btn annulation" name="annulation">Annulation</button>
	    </div>   
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <button type="submit" class="btn modification" name="modification">Modification de parcours</button>
      </div>   
    </div> 
   </div>
</form>
</div>

    </body>
</html>

