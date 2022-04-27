<?php
    session_start();
    if(!isset($_SESSION['LoggedInUser'])){
        header('Location: login.php');
        exit;
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
            <div class="dropdown text-end" style="margin-left: auto;">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="usericons/<?php echo $_SESSION['profile_pic'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 mt-3 p-2 mybox-shadow">
                <h3 class="text-center">Login</h3>
            </div>
        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/messenger.js"></script>
    <?php unset($dbh); ?>
  </body>
</html>