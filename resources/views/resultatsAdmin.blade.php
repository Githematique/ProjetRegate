@extends('header')

@section('title', 'ResultatsAdmin')

@section('content')

<div class="row text-center">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">Selection du fichier video :</div>
        <div class="panel-body">


     <video id="video" controls="" preload="none">
      <source id="mp4" src="/videos/trailer.mp4" type="video/mp4">
       <p>Votre navigateur ne supporte pas ce type de vidéo HTML.</p>
 </video>

<div id="buttons">
      <button class="large awesome" onclick="document._video.load()">Recharger la vidéo</button>
      <button class="large awesome" onclick="document._video.play()">Lire</button>
      <button class="large awesome" onclick="document._video.pause()">pause</button>
      <button class="large awesome" onclick="document._video.currentTime+=10">Avancer de 10s</button>
      <button class="large awesome" onclick="document._video.currentTime-=10">Reculer de 10s</button>
      <button class="large awesome" onclick="document._video.playbackRate++">Accelerer</button>
      <button class="large awesome" onclick="document._video.playbackRate--">Ralenti</button>
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
@endsection
