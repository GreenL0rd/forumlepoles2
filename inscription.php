<?php

include('includes/db.php');
$error='';
if (!empty($_POST) ){

	if ( $_POST['password'] === $_POST['password_'] ) {
		
		$sql = 'INSERT INTO users (pseudo, email, password) VALUES ("' .$_POST['pseudo'] . '","' . $_POST['email'] . '","' . $_POST['password'] . '");';
		$pdo->query($sql);
		$request = $pdo->query('SELECT * FROM users WHERE email ="'.$_POST['email'].'" AND password= "' . $_POST['password']. '";');
		$result = $request->fetchAll();
		if ( $result ){ 
			$_SESSION['user'] = $result[0];
			header('Location:./');
			die();
		}
	
	} else {
		
		$error = 'les mots de passe sont différents !';
	}	

}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<title>Document</title>
</head>
<body>
	<style scoped>
			body{
				font: 16px 'Comfortaa', sans-serif;
				margin: 0 auto;
				background: url(images/Light_Bird_Abstract_Design.jpg) no-repeat center center fixed;
				background-size: cover;

				
			}
			.container{
				margin: 150px auto;
				display: block;
				width: 400px;
				
				background: rgba(0,0,0,0.5);
				border: solid 1px #000;
				border-radius:  10px;
				


			}
			h2{
				text-align: center;
				color: #fff;
				font-size: 3vw;
				font-weight: lighter;
			}
			input[type="submit"]{
				background: rgba(63, 164, 0, 0.9);
				width: 60%;
				border: none;
				border-radius: 10px;
				margin-bottom: 20px;
			
			
			}
			input[type="submit"]:hover{
				background: rgba(36, 115, 62, 0.9);
			}
			input{
				width: 80%;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				padding: 5px;
				margin: 30px auto;
				line-height: 30px;
				display: block;
				background: rgba(2, 52, 139, 0.9);
				border: solid 1px #000;
				color: #fff;
			}
			h1{
				font-weight: lighter;
				width: 100%;
				border-radius: 10px 10px  0 0;
				text-align: center;
				background: none repeat scroll  0 0 rgba(0,0,0,0.5);
				color: #fff;
				line-height: 50px;
				margin: 0 auto;
				

			}

		</style>
	<form action="inscription.php" method="post">
		
			<h2>Bienvenue sur la page d'inscription</h2>
			<div class="container">

			<h1>Inscription</h1>
				<input type="text" name="email" autofocus placeholder="Adresse mail">
				<input type="name" name="pseudo" placeholder="pseudonyme">
				<input type="password" name="password" placeholder="Mot de passe">
				<input type="password" name="password_" placeholder="Retapez mot de passe">
				<input type="submit" value="Envoyer" id="btn">
			</div>
			
	</form>
</body>
</html>