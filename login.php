<?php
    session_start();
    if(isset($_SESSION['LoggedInUser'])){
        header('Location: index.php');
        exit;
    } //Redirect any LoggedIn user to home
    include_once"includes/functions.php";
    $error = '';
    if(!empty($_POST)){
        print_r($_POST);
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_new = $password;
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if( empty(trim($email)) || empty($password)){
            $error = "Email or Password are empty.";
        }

        if(empty($error) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)===false){
            $error = 'Invalid email, Use valid email';
        }

        if(empty($error)){
            include_once"database/db.php";
            $stm = $dbh->prepare("SELECT * FROM user WHERE email = :email");
            $stm->bindValue(":email",$email);
            $stm->execute();
            $count = $stm->rowCount();
            if($count>0){
                $row = $stm->fetch(PDO::FETCH_ASSOC);
                print_r($row);
            }else{
                $error = "No user found.";
            }
        }

        if(empty($error) && !empty($row) && array_key_exists('id', $row) && (count($row)>0) ){
            //Procced for login
             $hash = $row['password'];
            //echo strlen($hash);
            //echo $password_new;
            //echo $hash;

            //$isPasswordVarified = password_verify($password_new, $hash);<- DEPRECATED
            $isPasswordVarified = messenger_verify($password_new, $hash);

            if($isPasswordVarified){
                //echo"do more";
                        $_SESSION['LoggedInUser'] = $row['full_name'];
                        $_SESSION['UserId'] = $row['id'];
                        $_SESSION['profile_pic'] = $row['profile_pic'];
                        $_SESSION['loggedin_time'] = time();
                        header("Location: index.php");
                        exit;
            }else{
                $error = "Invalid password.";
            }
        }

    }
?>

<?php include_once"includes/header.php"; ?>
   
    <nav class="navbar mybox-shadow">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Messenger</span>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-3 mt-5 p-3 mybox-shadow">
                <h5 class="text-center mb-3 font_weight300">Sign In</h5>
                <?php if($error != ''){?>
                    <div class="alert alert-danger" role="alert">
                       <?php echo $error; ?>
                    </div>
                <?php }?>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="Email" name="email" required placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="Password" required name="password" placeholder="Password">
                    </div>
                    <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>
                <p>New to site, <a href="createnewuser.php">Create a account</a></p>
            </div>
        </div>
    </div>


<?php include_once"includes/footer.php"; ?>