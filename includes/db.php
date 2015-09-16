<?php

session_start();

$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO($dsn, $user, $pass);
