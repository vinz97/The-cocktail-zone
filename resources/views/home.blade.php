<html>
<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/home_style.css')}} " />
    <script src="{{ asset('/js/home_script.js')}} " defer="true"> </script>
</head>
<body>
<div class="container">
  <div class="box">
    <a href="{{ asset('/home') }}"><img src="https://www.radiodelta1.it/wp-content/uploads/2018/01/cocktail.jpg"></a>
    @if (isset($username))
      <p> Benvenuto, {{$username}}! </p>
      @endif
  </div>

</div>
<h1> The Cocktail Zone </h1>
<nav class="navigation">
  <ul class="mainmenu">
    <li><a href="{{ asset('/home') }}">Home</a></li>
    <li><a href="{{ asset('/logout') }}">Logout</a></li>
    <li><a href="{{ asset('/search') }}">Ricerca</a></li>
    <li id="raccolta"><a>Crea una nuova raccolta</a>
    <form class="hidden" name="form_home"  method="post">
    <label>Inserisci il nome della raccolta che vuoi creare</label><br>
                @csrf
              <input type="text" name="nome_raccolta" placeholder="Nome raccolta">
              <input type="submit" name="invio" value="ok">
    </form>
    </li>
  </ul>
</nav>
</body>
</html>
