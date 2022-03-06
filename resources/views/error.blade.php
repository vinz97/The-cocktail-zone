<html>
    <head>
        <title>Error 404</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('/css/error_style.css')}} " />
<body>
    <h1>ERROR 404: la pagina non esiste o non hai i requisiti per visualizzarla </h1>
    <form action="{{ asset('/home') }}">
    <input type="submit" value="Torna all'homepage">
    </form>
    </body>
</body>
</html>
