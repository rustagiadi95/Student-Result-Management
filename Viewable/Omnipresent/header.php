<?php 
    if(isset($_SESSION['username'])){
?>
    <div class="container-fluid" id = "main">
        <div class = "row" id = "head">
            <div class = "col-sm-6"  id="title">
                <a href="index.php"><b>Result Management System</b></a>
            </div>
            <div class="col-sm-6"  id="links" >
                 <a href="contact.php">Contact&nbspus</a> ||
                 <a href="../logOut.php" data-toggle="modal" data-target="#myModal">Log Out</a>
            </div>
        </div>
    </div>
<?php }else{?>    
<div class="container-fluid" id = "main">
        <div class = "row" id = "head">
            <div class = "col-sm-6"  id="title">
                <a href="index.php"><b>Result Management System</b></a>
            </div>
            <div class="col-sm-6"  id="links" >
                 <a href="contact.php">Contact&nbspus</a> ||
                 <a href="signin.php" data-toggle="modal" data-target="#myModal">SignIn</a> ||
                 <a href="signup.php" data-toggle="modal" data-target="#myModal2">SignUp</a>
            </div>
        </div>
</div>
<?php }?>