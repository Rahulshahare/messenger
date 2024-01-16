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
                <ul class="dropdown-menu dropdown-menu-end text-small mybox-shadow" aria-labelledby="dropdownUser1">
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
                <div  class="col-md-4 col-3" style="padding: 0;">
                    <div class="card" style="border-right: none;border-radius: 0px;">
                        <div class="card-header text-center" style="font-weight:700;background: none;padding: 1rem;">
                            FRIENDS
                        </div>
                        <div class="card-body" style="max-height: 500px;overflow: auto;">
                            <div id="UserList" class="list-group">
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="col-md-7 col-9"" style="padding: 0;">
                    <div id="introBox"  class="card" style="border-radius: 0px;">
                        <div class="h500">
                            <div class="card-body"  style="max-height: 557px;min-height: 557px;overflow: auto;">    
                                <h1 class="text-center mt-4 " >MESSENGER</h1>
                                <h6 class="text-secondary text-center">
                                    <span style="text-decoration: underline;">A unique way to say HELLO</span>
                                </h6>   
                                <div class="text-center">
                                    <img src="images/hello.svg" class="img-fluid" style="width: 50%;"/>
                                </div>  
                                <div style="background: #f6f6f6;padding: 40px 0px;">
                                    <h5 class="text-center" style="">Say Hello with <span style="color: #fff;background: #000000;padding: 6px;border-radius: 10px;font-weight: 900;">Text</span></h5>                                    
                                    <h5 class="text-center mt-4" style="">Say Hello with 3000+ emoji <span style="color: #fff;background: #000000;padding: 6px;border-radius: 10px;">😉</span></h5>       
                                    <h5 class="text-center mt-4" style="">Say Hello with beautiful images <span><img src="images/image-photo.png" class="img-fluid" style="width: 7%;color: #fff;background: #000000;padding: 6px;margin-right: 10px;border-radius: 10px;"> </span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="msgBox"  class="card d-none" style="border-radius: 0px;">
                        <div class="card-header" id="User_two_details" style="font-weight: 700;background: none;padding: 1rem;">
                            USERNAME
                        </div>
                        <div class="h500">
                        <div id="scrollingComponent" class="card-body"  style="max-height: 432px;min-height: 432px;;overflow: auto;">
                            
                                <ul class="list-group" id="Messagebox"></ul>
                            
                        </div>
                        <div class="card-footer" style="height: 68px;border-top: none;background: none;">
                            <div class="msg-form" style="width: 100%;height: 100%;border-radius: 50px;border: 1px solid rgb(219 219 219);padding: 6px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2 text-center" style="margin: auto;">
                                            <a class="btn" style="display: table-row;" title="Select emoji">
                                                <img src="images/1F600.svg" class="img-fluid" style="width: 50%;"/>
                                            </a>
                                        </div>
                                        <div class="col-8" style="padding: 0;">
                                            <textarea class="form-control" id="messenger-text" style="height: 38px; border: none;" spellcheck="false" placeholder="Message.."></textarea>
                                        </div>
                                        <div id="Sendbutton" class="col-2 d-none">
                                            <button type="button" class="btn btn-link sendButton" style="text-decoration: none;">Send</button>
                                        </div>
                                        <div id="Imagepicker" class="col-2 text-center" style="position: relative;margin: auto;">
                                        <form enctype="multipart/form-data" name='imageform' role="form" id="imageform" method="post" action="#">
                                            <input type="file" id="send_image" accept="image/*" name="file" class="inputfile form-control">
                                        </form>
                                            <img src="images/image.png" class="img-fluid" style="width:30%;"/>
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