<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";

// $conn = new mysqli($servername, $username, $password);

// if ($conn->connect_error) {
    // die("Failed to connect: " . $conn->connect_error);
// } 

// if (!empty($_GET['id'])) {
	// #TODO: Redirect
  // $id = urlencode($_GET['id']);

  // $stmt = $handler->prepare("SELECT * FROM shorturls WHERE id = ?");

  // $stmt->bind_param('s', $id);
  // $stmt->execute();

  // if ($stmt->get_result()) {
    // var_dump($res->fetch_all());
  // }

  // header("Location: " + $url);
  // die();
// }

?>

<!DOCTYPE html>
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
	  
	  #textarea:focus {
		  border-bottom: 1px solid red;
		  box-shadow: 0 1px 0 0 red;
		}

		#textarea:focus + label {
		  color: red;
		}
	   
	</style>
    <title>ExoShortener</title>

    <!-- JQuery and Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	
  </head>
   <header>
  <body class="grey lighten-3">
    <nav>
		<div class="nav-wrapper blue">
		  <a class="brand-logo" style="padding: 0px 10px;">ExoShortener</a>
		  <ul id="nav-mobile" class="right hide-on-med-and-down">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="admin.php">Admin</a></li>
		  </ul>
		</div>
	  </nav>
	</header>
	<main>
    <div class="container">
			<div class="row" style="padding-top: 10%;">
			<div class="col s12 m6 offset-m3">
			<div class="card hoverable">
            <div class="card-content">
			
			<span class="card-title">Short a URL</span>
			<p>
			  <form action = "<?php $_PHP_SELF ?>" method = "POST">
				
				<div class="row">
				  <div class="input-field col s12">
				    <input id="url" type="text" name="url">
				    <label for="url">URL</label>
				  </div>
				  
				  <div class="input-field col s12" color="color:orange;">
				    <input id="password" type="password" class="validate" name="pw">
				    <label for="password">Password</label>
				  </div>
				</div>
				
				<center><button class="btn-large waves-effect waves-light blue" type="submit" name="action">Short!</button></center>
				
			  </form>
			  <br>
			</p>
			</div>
			</div>
			
			</div>
			</div>
      </div>
	
	</div>
	<script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
	var textarea = document.getElementById('info');
	var w = 'Thanks for using this Service';
	var textValue=textarea.value; 
	if (textValue.indexOf(w)!=-1)
	{
	} else {
		 setTimeout(function () { location.reload(true); }, 3000);
	}
	</script>
	  </main>
	  
	     <footer class="page-footer blue">
          <div class="footer-copyright">
            <div class="container">
            Made by sapphyrus & ToxicOverflow
            <a class="grey-text text-lighten-4 right" href="https://github.com/sapphyrus/ExoShortener" target="_blank">GitHub</a>
            </div>
          </div>
        </footer>

    </div> <!-- /container -->
	</body>
</html>
