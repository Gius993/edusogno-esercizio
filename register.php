<?php
require_once __DIR__ . '/config.php';

$nome = $conn->real_escape_string($_POST['nome']);
$cognome = $conn->real_escape_string($_POST['cognome']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

$sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";
if($conn->query($sql) === true){
	echo 'Registrazione effetuata';
}else{
	echo 'errore registrazione ';
}
?>