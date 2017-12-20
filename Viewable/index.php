<?php session_start(); include("Omnipresent/header.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        body{
            background-image : url("../images/Untitled-1 copy.jpg") ;
            background-attachment : fixed ;
            background-repeat : no-repeat ;
        }
    </style>
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css">  
    <script src="../bootstrap\js\bootstrap.min.js"></script>
    <script src="../js/oops.js"></script>
    <script src="../js/teacher_oops.js"></script>
    <script src="../js/student_oops.js"></script>
    

    <link rel="stylesheet" type="text/css" href="../css/static.css">
</head>
<body>
    <?php 
        if(isset($_SESSION['username'])){
            if($_SESSION['usertype'] == 1){ ?>
    <br><br>
    <div class="container-fluid" id="Main">
    <div class="row" style="padding-left:25px;">
        <div class="col-sm-3" >
 	        <h1 style="color:lightblue;text-shadow:2px 2px 3px black">
                <b>Welcome <?php echo $_SESSION['username']?></b>
            </h1>
        </div>
        <div class="col-sm-9" id="buttons"></div>
    </div>
    <br>
    <div class="row" >
	    <div class="col-sm-3" id="dash">
            <div class="list-group">
            <a href="#" class="list-group-item disabled" >ADMIN DASHBOARD</a>

            <a href="#" class="list-group-item list-group-item-warning" onclick="AdminRead(1)">
                <h4 class="list-group-item-heading">Semester</h4>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" onclick="AdminRead(2)">
                <h4 class="list-group-item-heading">Teacher  </h4>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" onclick="AdminRead(3)">
                <h4 class="list-group-item-heading">Student  </h4>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" onclick="Button()">
                <h4 class="list-group-item-heading">View Result  </h4>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" onclick="AdminRead(5)">
                <h4 class="list-group-item-heading">Suggestions </h4>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" onclick="AdminUpdate()">
                <h4 class="list-group-item-heading">Update Password</h4>
            </a>
            </div>
        </div>
        <br><br>
        <div class="col-sm-9" id = "display"></div>
    </div>
    </div>

    <?php   }
            if($_SESSION['usertype'] == 2){
    ?>
    <br><br>
    <div class="container-fluid" id="Main">

    <div class="row" style="padding-left:25px;">
    <div class="col-sm-4" >
 	    <h1 style="color:lightblue;text-shadow:2px 2px 3px black">
            <b>Welcome <?php echo $_SESSION['username']?></b>
        </h1>
    </div>
    <div class="col-sm-8" id="buttons">
    </div>
    </div>
    <br>
    <div class="row" >
	    <div class="col-sm-4" id="dash">
            <div class="list-group">
            <a href="#" class="list-group-item disabled" >STUDENT'S DASHBOARD</a>

            <a href="#" class="list-group-item list-group-item-warning" onclick="button1(<?php echo $_SESSION['Enrollment_Number'] ?>)">
                <h4 class="list-group-item-heading">View Result</h4>
            </a>
             
            <a href="#" class="list-group-item list-group-item-warning"onclick="StudentProfileForm(<?php echo $_SESSION['Enrollment_Number'] ?>)">
                <h4 class="list-group-item-heading">Update Profile</h4>
            </a>
            </div>
        </div>
        <div class="col-sm-8" id="display" >
            
        </div>
    </div>
    </div>
                    
    <?php   }
            if($_SESSION['usertype'] == 3){ ?>
    <br><br>
    <div class="container-fluid" id="Main">
    <div class="row" style="padding-left:25px;">
    <div class="col-sm-4" >
 	    <h1 style="color:lightblue;text-shadow:2px 2px 3px black">
            <b>Welcome <?php echo $_SESSION['username']?></b>
        </h1>
    </div>
    <div class="col-sm-8" id="buttons">
    </div>
    </div>
    <br>
    <div class="row" >
	    <div class="col-sm-3" >
            <div class="list-group">
            <a href="#" class="list-group-item disabled" >TEACHER DASHBOARD</a>

            <a href="#" class="list-group-item list-group-item-warning" onclick="buttons(<?php echo $_SESSION['Teacher_ID'] ?>,'1')">
                <h4 class="list-group-item-heading">Students Assigned</h4>
            </a>
            <a href="#" class="list-group-item list-group-item-warning" onclick="buttons(<?php echo $_SESSION['Teacher_ID']?>, '2')">
                <h4 class="list-group-item-heading">Result </h4>
            </a>
            
            <a href="#" class="list-group-item list-group-item-warning" onclick="EditTeacherForm(<?php echo $_SESSION['Teacher_ID']?>)">
                <h4 class="list-group-item-heading">Update Profile</h4>
            </a>
            </div>
        </div>
        <div class="col-sm-7" id="display">
            
        </div>
    </div>
    </div>
                
    <?php   }
        }
        else{
            include("home.php") ;
        }
        include('Omnipresent/footer.php') ;
    ?>
</body>
</html>