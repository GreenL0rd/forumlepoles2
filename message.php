<?php

include('includes/db.php');

if (empty ($_SESSION['user']) ) {
	header('Location: index.php');
	die();
}

if ( !empty($_POST) ) {
	$pdo->query('INSERT INTO messages (creation, creatorId, topicId, message) VALUES (' . '"' . date('Y-m-d H:i:s') . '", "' . $_SESSION['user']['id'] . '", "' . $_POST['topicId'] . '", "' . $_POST['message'] . '");');
	header('Location: ./');
	die();
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
	<title>Document</title>
	<link rel="stylesheet" href="css/message.css"/>
</head>
<body>
<?php

				$request = $pdo->query('SELECT * FROM messages ORDER BY message DESC;');
				$results = $request->fetchAll();
				foreach ( $results as $result ) {
?>

                        
                <p><?=$result['message']?></p>

</body>
</html>
