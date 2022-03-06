<html>
    <head>
        <title>Collection</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/collection_style.css')}} " />
        <script src="{{ asset('/js/collection_script.js')}} " defer="true"> </script>
    </head>
    <body>
    <div class="container">
      <div class="box">
        <img src="http://www.ilpettegoloblogrovigo.it/wp-content/uploads/Locke-and-Remedy.jpg">
         <p>{{$raccolta}}</p>
      </div>
    </div>
    <h1> The Cocktail Zone </h1>
    <nav class="navigation">
      <ul class="mainmenu">
        <li><a href="{{ asset('/home') }}">Home</a></li>
        <li><a href="{{ asset('/logout') }}">Logout</a></li>
        <li><a href="{{ asset('/search') }}">Ricerca</a></li>
      </ul>
    </nav>
    </body>
    </html>
