
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/signup_style.css')}} " />
    <script src="{{ asset('/js/signup_script.js')}} " defer="true"> </script>
</head>
	<body>
        <div class="pre_contenitore">
            <p>Registrazione</p>
		</div>
		<div class="contenitore">

			<form name="form_register" method="post">
                <p>Compila tutti i campi</p>
                @csrf
                    <p>
						<label>Nome</label><br>
							<input type="text" name="name" placeholder="Nome">
                    </p>
                    <p>
						<label>Cognome</label><br>
							<input type="text" name="surname" placeholder="Cognome">
                    </p>
                    <p>
						<label>E-mail</label><br>
							<input type="text" name="email" placeholder="E-mail">
                    </p>
                    <p>
						<label>Residenza</label><br>
							<input type="text" name="residenza" placeholder="Comune di residenza">
                    </p>
                    <p>
						<label>Sito web</label><br>
							<input type="text" name="sitoweb" placeholder="Profilo Instagram, Facebook, Youtube...">
					</p>
					<p>
						<label>Username</label><br>
							<input type="text" name="username" class= "username" placeholder="Username">
					</p>
					<p>
						<label>Password</label><br>
							<input type="password" name="password" placeholder="Password">
                    </p>
                    <p>
						<label>Conferma la password</label><br>
							<input type="password" name="repassword" placeholder="Reinserisci la password">
                    </p>

                            Confermo di avere almeno 18 anni <input type="checkbox" name="maggiorenne" value="yes">

                        <input type="submit" name="invio" value="Registrati">
                            <p id="errore"> </p>
			</form>
		</div>
        <p id="login"><a href="{{ asset('/login')}} "><button>Torna al login</button></a></p>
	</body>
</html>
