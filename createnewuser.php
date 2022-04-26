<?php
    if(!empty($_POST)){
        print_r($_POST);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/messenger.css" rel="stylesheet">

    <title>Messenger</title>
  </head>
  <body>
   
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Messenger</span>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 mt-5 p-3 mybox-shadow">
                <h3 class="text-center mb-3">Create new account</h3>
                <form action="createnewuser.php" method="POST">
                <div class="mb-3">
                        <label for="Fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="Fullname" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="Email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password" name="password" required>
                    </div>
                    <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Create New Account</button>
                    </div>
                </form>
                <p>Already a user?, <a href="login.php">Login in now</a></p>
            </div>
        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/messenger.js"></script>
  </body>
</html>