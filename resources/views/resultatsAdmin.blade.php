@extends('header')

@section('title', 'ResultatsAdmin')

@section('content')

<div class="row text-center">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">Selection du fichier video :</div>
        <div class="panel-body">
<video  id="video" controls="controls" preload="auto">
      <source src="/videos/trailer.mp4" type="video/mp4">
       <p>Votre navigateur ne supporte pas les éléments HTML5 Video.</p>
 </video>
<div id="buttons">
      <button class="large awesome" onclick="document._video.load()">Réinitialiser</button>
      <button class="large awesome" onclick="document._video.playbackRate+=0.4">Accélérer</button>
      <button class="large awesome" onclick="document._video.playbackRate-=0.4">Ralentir</button>
      <button class="large awesome" onclick="document._video.currentTime+=10">+ 10 Secondes</button>
      <button class="large awesome" onclick="document._video.currentTime-=10">- 10 Secondes</button>

    </div>
        </div>
      </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">    
    <div class="panel panel-default">
        <div class="panel-heading">Liste des Bateaux : </div>
        <div class="panel-body">
       <table class="table">
    <thead>
      <tr>
        <th>Nom</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <th>{{ $data->nom }}</th>
      </tr>
      @endforeach
    </tbody>
  </table>
        </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
     <div class="panel panel-default">
        <div class="panel-heading">Podium : <i class="far fa-file-pdf"></i> </div>
          <div class="panel-body">
            <table class="table text-center">
              <thead>
                <tr>
                  <th class="text-center">Id Bateau</th>
                  <th class="text-center">Heure d'arrivée</th>
                  <th class="text-center">Classement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>          
          </div>
      </div>
  </div>
<a id="test">currentTime</a>
<a id="heure">heure actuelle</a>
<a id="addition">addition</a>
</div>
<script type="text/javascript">
  function init() {
    var oA = document.getElementById('test');
    var heur = document.getElementById('heure');
    var addi = document.getElementById('addition');

    oA.onclick = function()
     {
      document._video = document.getElementById("video");
      var curtime = document._video.currentTime;
      alert(curtime);
      };
    heur.onclick = function()
     { 
      var ladate = new Date();
      alert(ladate.getHours()+":"+ladate.getMinutes()+":"+ladate.getSeconds());
      };
    addi.onclick = function()
     { 
      document._video = document.getElementById("video");
      var curtime = document._video.currentTime;
// heure d'arrivée convertie en secondes
      var heure_arr = new Date(); 
      var heure_arrSec=heure_arr.getSeconds();
      var heure_arrMin=heure_arr.getMinutes() *60; 
      var heure_arrHeures=heure_arr.getHours()*3600; 
      var heure_arrSecTotales=heure_arrMin+heure_arrHeures+heure_arrSec;
// heure de depart convertie en secondes
      var heure_dep = new Date(); 
      var heure_depSec=heure_dep.getSeconds();
      var heure_depMin=heure_dep.getMinutes() *60; 
      var heure_depHeures=heure_dep.getHours()*3600; 
      var heure_depSecTotales=heure_depMin+heure_depHeures+heure_depSec;
// temps de la regate entre le depart et le declenchement de l'arrivée en secondes
      var tempsRegate=heure_arr-heure_dep; 
// temps total du bateau en secondes           
      var tempsBateau=tempsRegate+curtime;       
// reconvertion duree regate de seconde a h/min/sec
      var DureeRegate=tempsRegate;
      var RegateJours=Math.floor(DureeRegate/(3600*24));
      DureeRegate -= RegateJours*24*3600;
      var RegateHours=Math.floor(DureeRegate/3600);
      DureeRegate -= RegateHours*3600;
      var RegateMinutes=Math.floor(DureeRegate/60);
      DureeRegate -= RegateMinutes*60;
      var RegateSeconds=DureeRegate;
      var resultRegate=RegateJours+'j '+RegateHours+'h '+RegateMinutes+'min '+RegateSeconds+'s ';
// reconvertion duree total bateau de seconde a h/min/sec
      var DureeBateau=tempsBateau;
      var BateauJours=Math.floor(DureeBateau/(3600*24));
      DureeBateau -= BateauJours*24*3600;
      var BateauHours=Math.floor(DureeBateau/3600);
      DureeBateau -= BateauHours*3600;
      var BateauMinutes=Math.floor(DureeBateau/60);
      DureeBateau -= BateauMinutes*60;
      var BateauSeconds=DureeBateau;
      var resultBateau=BateauJours+'j '+BateauHours+'h '+BateauMinutes+'min '+BateauSeconds+'s ';
      alert(resultBateau);
      }
  }
document.addEventListener("DOMContentLoaded", init, false);

</script>
@endsection
