<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script type="text/javascript" src="{{ URL::asset('js/vendor.js') }}"></script>
    </head>
    <body>
      <nav id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header"><a class="navbar-brand" href="/"><i class="far fa-life-ring"></i> Projet Régate</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
              <li><a href="/admin/regate">Parametrage de la Regate</a></li>
              <li><a href="/admin/gestion">Gestion des participants</a></li>
              <li><a href="/admin/camera">Camera</a></li>
              <li><a href="/admin">Podium</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <main class="main-container">

      @yield('content')
    </main>


      <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
    </body>
</html>
