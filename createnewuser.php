<?php
session_start();
if(isset($_SESSION['LoggedInUser'])){
    header('Location: index.php');
    exit;
}
// set the default timezone to use.
date_default_timezone_set('UTC');
$error = '';
    if(!empty($_POST)){
        print_r($_POST);
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if(empty(trim($fullname)) || empty(trim($email)) || empty(trim($password))){
            $error = "Name, Email or Password are empty.";
        }

        if(empty($error) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)===false){
            $error = 'Invalid email, Use valid email';
        }

        if(empty($error)){
            //email is unique in system, check wheather email is already exist
            include_once"database/db.php";
            $stm = $dbh->prepare('SELECT * FROM user WHERE email = :email');
            $stm->bindValue(':email',$email);
            $stm->execute();
            $count = $stm->rowCount();
            if($count > 0){
                $error = "Email already exist,Try with new email.";
            }else{
                //Creating new user
                $password = password_hash($password, PASSWORD_BCRYPT);
                //echo $password;
                $img = substr($fullname, 0,1); //getting first latter of full name
                $img = "letter-".$img.".png"; //creating image name
                //echo $img;
                $today = date("Y-m-d H:i:s"); 
                echo $today;

            }

        }
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
    <link href="css/messenger.css?v=0.01" rel="stylesheet">

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
                <h5 class="text-center mb-3 font_weight300">Create new account</h5>
                <?php if($error != ''){?>
                    <div class="alert alert-danger" role="alert">
                       <?php echo $error; ?>
                    </div>
                <?php }?>
                <form action="createnewuser.php" method="POST">
                    <div class="mb-3">
                        <label for="Fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="Fullname" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
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