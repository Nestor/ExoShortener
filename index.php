<?php
$servername = "localhost";
$username = "username";
$password = "password";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
} 

$conn

if (!empty($_GET['id'])) {
	#TODO: Redirect
    header("Location: http");
    die();
}

?>

<html lang="de">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content=""> 
<style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
</style>
<title>ExoShortener</title>

<!-- JQuery and Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

</head>
  
<!-- TODO: Shortener Page-->