<?php
$config = [
  'mysql' => [
    'host' => 'env',
    'user' => 'root',
    'password' => '',
    'database' => 'ExoShortener'
  ],
  'url' => [
    'minlength' => 3,
    'maxlength' => 32
  ]
];

 $conn = new MySQLi(
   $config['mysql']['host'],
   $config['mysql']['user'],
   $config['mysql']['password'],
   $config['mysql']['database']
 );

if ($conn->connect_error) {
    die("Failed to connect: {$conn->connect_error}");
}

if (isset($_POST['id']) && isset($_POST['password']) && isset($_POST['target'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $target = $_POST['target'];

    if (
      strlen($id) > ($config['url']['minlength'] - 1)
      && strlen($id) < ($config['url']['maxlength'] + 1)
      && filter_var($target, FILTER_VALIDATE_URL)
    ) {
      $stmt = $conn->prepare('SELECT * FROM shorturls WHERE id=?');
      $stmt->bind_param('s', $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();

      if ($result->num_rows < 1) {
        $stmt = $conn->prepare('INSERT INTO shorturls (id, target, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $id, $target, $password);
        $stmt->execute();
      }
    }
}

if (isset(array_keys($_GET)[0])) {
    $id = urlencode(array_keys($_GET)[0]);

    $stmt = $conn->prepare('SELECT * FROM shorturls WHERE id=?');
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows < 1) {
        die(
            header('Location: /')
        );
    }

    $url = $result->fetch_assoc();
    die(
        header(
            sprintf('Location: %s', $url['target'])
        )
    );
}
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

        #textarea:focus+label {
            color: red;
        }
    </style>
    <title>ExoShortener</title>

    <!-- JQuery and Materialize -->
    <script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" />
    <script src="https:cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

</head>
<header>

    <body class="grey lighten-3">
        <nav>
            <div class="nav-wrapper blue">
                <a class="brand-logo" style="padding: 0px 10px;">ExoShortener</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active">
                      <a href="/">Home</a>
                    </li>
                    <li>
                      <a href="admin.php">Admin</a>
                    </li>
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
                        <form class="url-form" action="/" method="post">

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="txt-url" type="text" name="id" required autofocus>
                                    <label for="txt-url">URL</label>
                                </div>

                                <div class="input-field col s12" color="color:orange;">
                                    <input id="txt-target" type="text" name="target" required>
                                    <label for="txt-target">Target</label>
                                </div>

                                <div class="input-field col s12" color="color:orange;">
                                    <input id="txt-password" type="password" class="validate" name="password" required>
                                    <label for="txt-password">Password</label>
                                </div>
                            </div>

                            <center>
                                <button type="submit" class="btn-large waves-effect waves-light blue">Short!</button>
                            </center>
                        </form>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
</main>

<footer class="page-footer blue">
    <div class="footer-copyright">
        <div class="container">
            Made by sapphyrus & ToxicOverflow
            <a class="grey-text text-lighten-4 right" href="https:github.com/sapphyrus/ExoShortener" target="_blank">GitHub</a>
        </div>
    </div>
</footer>

</div>
</body>

</html>
