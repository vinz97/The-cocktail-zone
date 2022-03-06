<html>
<head>
    <title>Ricerca</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/search_style.css')}} "  />
    <script src="{{ asset('/js/search_script.js')}} " defer="true"> </script>
</head>
<body>
<h1 id="title"> The Cocktail Zone </h1>
<nav class="navigation">
  <ul class="mainmenu">
    <li><a href="{{ asset('/home') }}">Home</a></li>
    <li><a href="{{ asset('/logout') }}">Logout</a></li>
    <li><a href="{{ asset('/search') }}">Ricerca</a></li>
    </li>
  </ul>
</nav>
  <form class="search-container" name="form_search">
      @csrf
    <input type="text"  name="testo" id="search-bar" placeholder="Scrivi qui cosa cercare">
    <img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png">
    <input type="submit" name="invio" value="cerca">
  </form>
<div class="container">
</div>
</body>
</html>
