<?php
require_once __DIR__ . '/config.php';

$nome = $conn->real_escape_string($_POST['nome']);
$cognome = $conn->real_escape_string($_POST['cognome']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$validazione = true; 
if($_SERVER["REQUEST_METHOD"] === "POST"){
$sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$hashed_password')";
}
if($conn->query($sql) === true){
	echo 'Registrazione effetuata';
	Header('location: ./index.php');
}else{
	echo 'errore registrazione ';
}


?>