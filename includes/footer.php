<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
  <?php if($_SERVER['PHP_SELF'] != "/messenger/login.php"  && $_SERVER['PHP_SELF'] != "/messenger/createnewuser.php") {?>
    <script src="js/messenger.js?v=0.0.7"></script>
    <script src="js/timeago.js"></script>
    <?php } unset($dbh); ?>
  </body>
</html>