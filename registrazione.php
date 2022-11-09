<?php
require_once __DIR__ . '/config.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno-registrazione</title>

</head>

<body>
	<h2>REGISTRATI</h2>
    <form action="register.php" method="POST">
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

        </p>
        <p>
            <label for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognome">

        </p>
        <p>
            <label for="email">email</label>
            <input type="text" name="email" id="email">

        </p>
        <p>
            <label for="password">password</label>
            <input type="text" name="password" id="password">

        </p>
        <input type="submit">
    </form>
</body>

</html>

