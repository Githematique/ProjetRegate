@extends('header')

@section('title', 'Home')

@section('content')

  <div class="container">
    <div class="blockStatus col-6 text-center">
<!--       <img class="gif" src="https://media.giphy.com/media/3o7aCVTfelG4XSbv3y/giphy.gif" alt="gif">
 -->    </div>

    <div class="col-6">
      <div class="panel panel-default">
        <div class="panel-heading">Status de la régate : <font style="text-transform: uppercase;">{!! $regate->etape !!}</font></div>
        <div class="panel-body">
          <i id="led1" class="led1"></i>
          <i id="led2" class="led2"></i>
          <i id="led3" class="led3"></i>
          <i id="led4" class="led4"></i>
          <i id="petitSon" class="fas fa-volume-down petitSon"></i>
          <i id="grandSon" class="fas fa-volume-up grandSon"></i>
        </div>
      </div>
    </div>
<form method="get" action="/ledOn" enctype="multipart/form-data">
        
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  <div class="flex">
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	      <button id="apercu" type="submit" class="btn apercu" name="apercu">Apercu</button>
	    </div>
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	      <button id="depart" type="submit" class="btn depart" name="depart">Départ</button>
	    </div>
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	      <button id="rappel_g" type="submit" class="btn rappel_g hide" name="rappel_g">Rappel</br>général</button>
	    </div>
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	      <button id="rappel_i" type="submit" class="btn rappel_i hide" name="rappel_i">Rappel </br>individuel</button>
	    </div>
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	      <button id="annulation" type="submit" class="btn annulation hide" name="annulation">Annulation</button>
	    </div>   
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <button id="modification" type="submit" class="btn modification hide" name="modification">Modification </br>de parcours</button>
      </div>   
    </div> 
   </div>
</form>
</div>
<script type="text/javascript">
  var test = '{!! $regate->etape !!}';
  console.log(test);
  if (test == 'depart') {
    document.getElementById("apercu").classList.add("hide");
    document.getElementById("depart").classList.add("hide");
    document.getElementById("rappel_g").classList.remove("hide");
    document.getElementById("rappel_i").classList.remove("hide");
    document.getElementById("annulation").classList.remove("hide");
    document.getElementById("modification").classList.remove("hide");
  } else if ((test == 'rappel_g') || (test == 'rappel_i') || (test == 'modification')) {
    document.getElementById("apercu").classList.add("hide");
    document.getElementById("depart").classList.add("hide");
    document.getElementById("rappel_g").classList.remove("hide");
    document.getElementById("rappel_i").classList.remove("hide");
    document.getElementById("annulation").classList.remove("hide");
    document.getElementById("modification").classList.remove("hide");
  }else {
    document.getElementById("apercu").classList.remove("hide");
    document.getElementById("depart").classList.remove("hide");
    document.getElementById("rappel_g").classList.add("hide");
    document.getElementById("rappel_i").classList.add("hide");
    document.getElementById("annulation").classList.add("hide");
    document.getElementById("modification").classList.add("hide");
  }
</script>

