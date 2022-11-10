
<?php
require_once __DIR__ . '/config.php';

$sql = "SELECT * FROM `eventi`";
$result = $conn->query($sql);
$events = [];
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $events[] = $row;
    }
}else{
    echo 'Non ci sono';

}
session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
	header("location: login.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
</head>

<body>
<?php
        require_once __DIR__ . './header.php';

    ?>
    <main>
        <h2>Pagina utente</h2>
        <?php foreach($events as $event){?>
            <div>
                <ul>
                    <li><?php echo $event['nome_evento']  ?></li>
                    <li><?php echo $event['attendees']  ?></li>
                    <li><?php echo $event['data_evento']  ?></li>
                </ul>
            </div>


        <?php  }?>
    </main>
</body>

</html>