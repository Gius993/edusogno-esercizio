<?php
require_once __DIR__ . '/config.php';
	session_start();
	if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] != true){
		Header('location: login.html');
		exit;
	}

	
	$logemail = $_SESSION['email'];
	$query = "SELECT * FROM `eventi` WHERE `attendees` LIKE '%$logemail%'";
	$result = mysqli_query($conn, $query);
	$events = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
        require_once __DIR__ . './header.php';

    ?>
	<h2>
		<?php
			echo 'Ciao ' . $_SESSION["nome"];
		?>

	</h2>
	<?php if (count($events) > 0) : ?>
        <?php foreach ($events as $event ) : ?>
			<ul>
				<li><?= $event['data_evento'] ?></li>
				<li><?= $event['nome_evento'] ?></li>
			</ul>
                
        <?php endforeach; ?>
        <?php else : ?>
        
           
              <h2>Nessun Evento trovato</h2>
            
      <?php endif; ?>
</body>
</html>