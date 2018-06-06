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
        <div class="pin-holder">
            <label for="pin">Code</label>
            <input type="password" name="pin" class="" id="pin">
        </div>

        <section class="pinpad-container">
            <div class="pinpad-row">
              <div class="button">
                1
              </div>
              <div class="button">
                2
              </div>
              <div class="button">
                3
              </div>
            </div>

            <div class="pinpad-row">
              <div class="button ">
                4
              </div>
              <div class="button ">
                5
              </div>
              <div class="button ">
                6
              </div>
            </div>

            <div class="pinpad-row">
              <div class="button ">
                7
              </div>
              <div class="button ">
                8
              </div>
              <div class="button ">
                9
              </div>
            </div>

        </section>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
