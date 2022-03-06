
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/login_style.css')}} " />
    <script src="{{ asset('/js/login_script.js')}} " defer="true"> </script>
</head>
	<body>
        <div class="pre_contenitore">
            <p>Login</p>
		</div>
		<div class="contenitore">
			<form name="form_login"  method="post">
				<p>Inserisci le tue credenziali</p>
					<p>
						<label>Username</label><br>
							<input type="text" name="username" class="username" placeholder="Username">
					</p>
					<p>
						<label>Password</label><br>
							<input type="password" name="password" class="password" placeholder="Password">
					</p>
                    @csrf
                        <input type="submit" name="invio">
                        @if(isset($error))
                            <p class="errore">
                                Username o password errati!
                            </p>
                        @endif
			</form>
		</div>
<p id="register"><a href="{{ asset('/register')}} "><button>Non hai ancora un account? Registrati qui</button></a></p>
	</body>
</html>
