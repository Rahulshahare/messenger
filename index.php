<?php
    session_start();
    if(!isset($_SESSION['LoggedInUser'])){
        header('Location: login.php');
        exit;
    }
?>
<?php include_once"includes/header.php"; ?>
   
    <nav class="navbar mybox-shadow">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Messenger</span>
            <div class="dropdown text-end" style="margin-left: auto;">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="usericons/<?php echo $_SESSION['profile_pic'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
            <?php echo $_SESSION['LoggedInUser'] ?>
          </a>
          <ul class="dropdown-menu text-small mybox-shadow" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Notification</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center">messenger</h3>
            </div>
            <div class="col-8">
                <h3 class="text-center">messenger</h3>
            </div>
        </div>
    </div>


<?php include_once"includes/footer.php"; ?>