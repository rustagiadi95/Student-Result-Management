<?php session_start() ;?>
      <!-- session_destroy() ; -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <style>
        body{
            background-image : url("../images/Untitled-1 copy.jpg") ;
            background-attachment : fixed ;
            background-repeat : no-repeat ;
        }
    </style>
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css">
    <script src="../bootstrap\js\bootstrap.min.js"></script>
    <script src="../js/signIn.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/static.css">
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
</head>
<body>
    <?php 
        include("Omnipresent/header.php") ;
        if(!isset($_SESSION['username'])){
    ?>
    <br>
    <div class="container" style="text-align:center">
        <h2>Login as a : </h2><br>
        <div class = "row">
            <div class = "col-sm-4" >
                <div id="admin" onclick="admin()"><h3>Admin</h3></div>
            </div>
            <div class = "col-sm-4">
                <div id="student" onclick="student()"><h3>Student</h3></div>
            </div>
            <div class = "col-sm-4">
                <div id="teacher" onclick="teacher()"><h3>Teacher</h3></div>
            </div>
        </div>
        <br><br><hr>
        <div class="row" >
            <div class = "col-sm-2"></div>
            <div class = "col-sm-8" id="form">
                <div class="wells">
                    Quote of the day : <br><br>
                    <i>Infuse your life with action.
                       Don't wait for it to happen. Make it happen.
                       Make your own future. Make your own hope.
                       Make your own love. And whatever your beliefs,
                       honor your creator, not by passively waiting for
                       grace to come down from upon high, but by doing
                       what you can to make grace happen... yourself,
                       right now, right down here on Earth.
                    </i>
                </div>
            </div>
            <div class = "col-sm-2"></div>
        </div>
    </div>
    <?php }else{ ?>
        <script>alert('Logout First')</script>
    <?php header('location:index.php#') ;}
          include("Omnipresent/footer.php") ; 
    ?>
</body>
</html>