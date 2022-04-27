<?php
    session_start();
    if(!isset($_SESSION['LoggedInUser'])){
        header('Location: login.php');
        exit;
    }
?>
<?php include_once"includes/header.php"; ?>
   
    <nav class="navbar whiteBackground mybox-shadow">
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
    <div class="messegner">
        <div class="container">
            <div class="row p25 justify-content-md-center">
                <div  class="col-4" style="padding: 0;">
                    <div class="card" style="border-right: none;border-radius: 0px;">
                        <div class="card-header text-center" style="font-weight: 500;background: none;padding: 1rem;">
                            FRIENDS
                        </div>
                        <div class="card-body" style="max-height: 500px;overflow: auto;">
                        <?php for ($i=0; $i < 15 ; $i++) { ?>
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-7" style="padding: 0;">
                    <div  class="card" style="border-radius: 0px;">
                        <div class="card-header" style="font-weight: 500;background: none;padding: 1rem;">
                            Featured
                        </div>
                        <div class="h500">
                        <div class="card-body" style="max-height: 432px;overflow: auto;">
                            <?php for ($i=0; $i < 15 ; $i++) { ?>
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            <?php } ?>
                        </div>
                        <div class="card-footer" style="height: 68px;border-top: none;background: none;">
                            <div class="msg-form" style="width: 100%;height: 100%;border-radius: 50px;border: 1px solid rgb(219 219 219);padding: 10px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2" style="position: relative;">
                                            <input type="file" accept="image/*" name="file" class="inputfile form-control">
                                            <img src="images/image.png" class="img-fluid" style="width: 40%;">
                                        </div>
                                        <div class="col-8">
                                            <textarea class="form-control" id="messenger-text" style="height: 38px; border: none;" spellcheck="false" placeholder="Message.."></textarea>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-link sendButton" style="text-decoration: none;">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once"includes/footer.php"; ?>