@extends('header')

@section('title', 'ResultatsAdmin')

@section('content')
<script type="text/javascript">
  var tmpTimeStart = moment('{!! $regate->heure_dep !!}');
  var tmpTimeEnd = moment('{!! $regate->heure_arr !!}');
</script>
<script type="text/javascript" src="{{ URL::asset('js/resultsPage.js') }}"></script>
<div class="row text-center">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">Selection du fichier video :</div>
      <div class="panel-body">
        <video id="video" controls preload="auto">
          <source src="videos/trailer.mp4" type="video/mp4">
           <p>Votre navigateur ne supporte pas les éléments HTML5 Video.</p>
        </video>
        <div id="buttons">
          <div class="">
            <button class="large awesome" onclick="document._video.load()"><i class="fas fa-stop"></i></button>
            <button class="large awesome" onclick="document._video.play()"><i class="fas fa-play"></i></button>
            <button class="large awesome" onclick="document._video.pause()"><i class="fas fa-pause"></i></button>
          </div>
          <div class="">
            <button class="large awesome" onclick="document._video.currentTime-=10"><i class="fas fa-step-backward"></i></button>
            <button class="large awesome" onclick="document._video.playbackRate-=0.4"><i class="fas fa-backward"></i></button>
            <button class="large awesome" onclick="document._video.playbackRate=1">Réinitialiser vitesse</button>
            <button class="large awesome" onclick="document._video.playbackRate+=0.4"><i class="fas fa-forward"></i></button>
            <button class="large awesome" onclick="document._video.currentTime += 10"><i class="fas fa-step-forward"></i></button>
          </div>
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
            @foreach($boats as $boat)
              @if (is_null($boat->temps) || strtotime($boat->temps) <= strtotime('00:00:01'))
                <tr>
                  <th>{{ $boat->nom }}</th>
                  <th>
                    <button type="button" name="button" class="set-arrival-btn btn btn-success">Arrivé
                      <input type="text" name="" value="{{$boat->bateau_id}}" class="hidden set-arrival-timer" disabled>
                      <input type="text" name="" value="{{$boat->nom}}" class="hidden set-arrival-name" disabled>
                    </button>
                  </th>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading">Podium :
        <a href="/admin/excel"><i class="far fa-file-pdf"></i> </a>
      </div>
      <div class="panel-body">
        <table class="table text-center">
          <thead>
            <tr>
              <th class="text-center">Bateau</th>
              <th class="text-center">Temps d'arrivé</th>
              <th class="text-center">Classement</th>
            </tr>
          </thead>
          <tbody class="podium-body">
            @if (count($podiumBoats) > 0)
              @foreach ($podiumBoats as $key => $podBoat)
                <tr>
                  <td>{{$podBoat->nom}}</td>
                  <td>{{$podBoat->temps}}</td>
                  <td>{{$key + 1}}</td>
                  <td>
                    <a href="{{url('/admin/boat/resetTime/'.$podBoat->bateau_id)}}"><i class="fas fa-times"></i></a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <a id="test">currentTime</a>
  <a id="heure">heure actuelle</a>
  <a id="addition">addition</a>
</div>

@endsection
