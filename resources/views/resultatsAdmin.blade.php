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
       <p>Your user agent does not support the HTML5 Video element.</p>
 </video>
<div id="buttons">
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
</div>
<script type="text/javascript">
  function init() {
    document._video = document.getElementById("video");
}
document.addEventListener("DOMContentLoaded", init, false);
</script>
@endsection
