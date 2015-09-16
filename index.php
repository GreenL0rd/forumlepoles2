<?php

include('includes/db.php');

if (empty ($_SESSION['user']) ) {
	header('Location: login.php');
	die();
}

if ( !empty($_POST) ) {
	$pdo->query(
		'INSERT INTO topics (creation, creatorId, title, description) VALUES (' . '"' . date('Y-m-d H:i:s') . '", "' . $_SESSION['user']['id'] . '", "' . $_POST['title'] . '", "' . $_POST['description'] . '");');
	header('Location: ./');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css"/>
</head>
<body>
<div id="head">
	<div class="users"> Bonjour <?=$_SESSION['user']['pseudo']?>
	<input type="button" value="deconnexion" onclick="self.location='deconnection.php'">
	<input type="button" value="Mon profil" onclick="self.location='profil.php'">
	</div>
</div>	

<h2 class="taille">Créer un topic</h2>
			<form action="index.php" method="post">
			<div class="container">
			<h1>Création</h1>
				<input type="text" name="title" placeholder="titre du topic">
				<textarea name="description" placeholder="Description"></textarea>
				<input type="submit" value="Créer" id="btn">
			</div>
			</form>

<h2>Liste des topics</h2>
			<div class="bloc">
                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Creation</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>

			<?php

				$request = $pdo->query('SELECT * FROM topics ORDER BY creation DESC;');
				$results = $request->fetchAll();
				foreach ( $results as $result ) {

			?>

                            <tr>
                                <td><?=$result['creation']?></td>
                                <td><a href="message.php?id=<?=$result['id']?>">Topic <?=$result['id']?> : <?=$result['title']?></a></td>
                                <td><?php


					$request = $pdo->query('SELECT * FROM users WHERE id = ' . $result['creatorId']);
					$resultB = $request->fetchAll();
					echo $resultB[0]['email'];


				?></td>
                                <td><?=$result['description']?></td>
                            </tr>

			<?php

				}

			?>
			</div>
			</tbody>
			</table>
			<footer>
			</footer>			
			
</body>
</html>
