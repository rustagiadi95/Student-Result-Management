<?php session_start() ;?><!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/static.css">
    <script src="../js/oops.js"></script>
    <style>
        body{
            background-image : url("../images/Untitled-1 copy.jpg") ;
            background-attachment : fixed ;
            background-repeat : no-repeat ;
        }
    </style>
</head>
<body>
    <?php include("Omnipresent/header.php")?><br><br>
    <div class="container-fluid" id="Main">
    
        <div class="row">
            <div class="col-sm-4">
                <h3 class="text text-danger">Contact Us:-</h3><br>
                <h4><span class="glyphicon glyphicon-user">Sonal Bansal</span><br><br>
                    <span class="glyphicon glyphicon-envelope">at :- bansalsonal51@gmail.com</span><br><br>
                    <span class="glyphicon glyphicon-phone">Ph : 9958565227</span><br><br>
                </h4>
                <h4><hr><br><span class="glyphicon glyphicon-user">Aditya Rustagi</span><br><br>
                    <span class="glyphicon glyphicon-envelope">at :- rustagiadi95@gmail.com</span><br><br>
                    <span class="glyphicon glyphicon-phone">Ph : 9582101601</span><br><br>
                </h4>
            </div>

            <div class="col-sm-6" id = 'acknowledge'>
                <h3 class="text text-primary">Fill the form for any suggestion:-</h3><br>

                <form method = "get">
                <div class="form-group">
                    <label for="Name">Name: </label>
                    <input type="text" id="name" class="form-control" required="required">
                </div>

                <div class="form-group">
                    <label for="Email">Email: </label>
                    <input type="email" id="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="Mobile">Mobile No.: </label>
                    <input type="text" id="mob" class="form-control"  pattern="[0-9]{10}" required="required">
                </div>
                <div class="form-group">
                    <label for="msg">Message: </label>
                    <textarea class="form-control" id="msg" rows="5"  placeholder="In 250 words..." required="required"></textarea>
                </div>

                <button type="button" class=" btn btn-danger btn-lg" onclick="saveSuggest()" >Submit</button>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    <?php include("Omnipresent/footer.php")?>
</body>
</html>