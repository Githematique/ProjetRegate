@extends('header')

@section('title', 'Login')

@section('content')
<form class="login-container" action="" method="post">
  <div class="pin-holder">
      <label for="pin">Code: </label>
      <input type="password" name="pin" class="" id="pin-input" maxlength="4" readonly>
  </div>

  <section class="pinpad-container">
      <div class="pinpad-row">
        <input type="button" class="button" id="pin-1" value="1"/>
        <input type="button" class="button" id="pin-2" value="2"/>
        <input type="button" class="button" id="pin-3" value="3"/>
      </div>

      <div class="pinpad-row">
        <input type="button" class="button" id="pin-4" value="4"/>
      <input type="button" class="button" id="pin-5" value="5"/>
        <input type="button" class="button" id="pin-6" value="6"/>
      </div>

      <div class="pinpad-row">
        <input type="button" class="button" id="pin-7" value="7"/>
        <input type="button" class="button" id="pin-8" value="8"/>
        <input type="button" class="button" id="pin-9" value="9"/>
      </div>
      <div class="pinpad-row">
        <input type="button" class="button" id="pin-back" value="Retour"/>
        <input type="submit" class="button" id="pin-enter" value="Entrer"/>
      </div>
  </section>
</form>

@endsection
