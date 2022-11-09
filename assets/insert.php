<?php
define(DB_SERVERNAME, 'localhost');
define(DB_USERNAME, 'root');
define(DB_PASSWORD, 'root');
define(DB_NAME , 'edusogno');
define(DB_PORT, 8889);

$connessione = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if($connessione &&  $connessione->connect_error){
    die('Errore di connessione:'. $connessione->connect_error);
}
$sql = "INSERT INTO `evento`(`attendees`, `nome_evento`, `data_evento`) 
VALUES  ('ulysses200915@varen8.com,qmonkey14@falixiao.com,mavbafpcmq@hitbase.net','Test Edusogno 1', '2022-10-13 14:00'), 
        ('dgipolga@edume.me,qmonkey14@falixiao.com,mavbafpcmq@hitbase.net','Test Edusogno 2', '2022-10-15 19:00'), 
        ('dgipolga@edume.me,ulysses200915@varen8.com,mavbafpcmq@hitbase.net','Test Edusogno 2', '2022-10-15 19:00')";


if($connessione->query($sql) === true){
    $ultimo_elemento = $connessione->insert_id;
    echo 'Hai fatto la figata';
}else{
    echo 'Non hai fatto la figata';
}
$connessione->close();
?>