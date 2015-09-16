<?php

include('includes/db.php');

$error = '';
if ( !empty( $_POST ) ) {

	$request = $pdo->query('Select * FROM users Where email = "' . $_POST['email'] . '" AND password = "' . $_POST['password'] . '";');
	$result = $request->fetchAll();
	if ($result) {
		$_SESSION['user'] = $result[0];
		header('location: ./');
		die();
	}
	$error = 'Email ou mot de passe invalide !';
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Forum</title>
<meta>
<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
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
				margin: 0 auto;
				display: block;
				width: 400px;
				
				background: rgba(0,0,0,0.5);
				border: solid 1px #000;
				border-radius:  10px;
				


			}
			img{
				border-radius:50%;
				width: 30%;
				display: block;
				margin: 0 auto;
				margin-top: 20px;
			}
			h2{
				text-align: center;
				color: #fff;
				font-size: 3vw;
				font-weight: lighter;
			}
			.container>input[type="Submit"]{
				background: rgba(63, 164, 0, 0.9);
				width: 60%;
				border: none;
				border-radius: 10px;
				margin-bottom: 20px;

			
			
			}
			a{
				background: rgba(0,0,0,0.3);
				border: solid 1px #fff;
				width: 240px;
				color: #fff;
				text-align: center;
				text-decoration: none;
				display: block;
				margin: 25px auto;
				line-height: 30px;
				border-radius: 10px;
				margin-bottom: 20px;
				font-weight: bolder;
				font-size: 1vw;
				
			
			
			}
			.container>input[type="Submit"]:hover{
				background: rgba(36, 115, 62, 0.9);
			}
			input[type="Submit"]:hover{
				background: black;
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
	<form action="login.php" method="post">
		<h2>Bienvenue sur notre forum</h2>
	
		<div class="container">
		<h1>Se connecter</h1>
		<img src="images/avatar.jpg">
		<input type="text" name="email"  autofocus placeholder="Adresse mail">
			<input type="password" name="password"  placeholder="Mot de passe">
			<input type="submit" value="Se connecter" >
		</div>
		</form>
	<a href="inscription.php">S'inscrire</a>

</body>
</html>