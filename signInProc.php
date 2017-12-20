<?php
session_start() ;
$em=$_GET['email'];
$ps=$_GET['pass'];
$user=$_GET['hidden'];

$conn = new mysqli("localhost","root","","srms");
if($conn->connect_error){
	die("connection failed" .$conn->connect_error);
	}
else{
switch ($user) {
	case 0:
	    $sql="select * from Admin";
		$result=$conn->query($sql);
			if($result->num_rows >0){
			    while ($row =$result->fetch_assoc()) {
				    if($em==$row['Email_ID'] && $ps==$row['Password'] )
                    {
						$_SESSION['username'] = $row['Name'] ;
						$_SESSION['usertype'] = 1 ;
                        header("location:Viewable/index.php#");
                    }
                    else{
                    	echo "wrong id/Password";
                    }			
				}
		    }
		    else{
				echo "No record found";
		    }		       		
	break;
				       	
	case 1:
    	$sql="select * from student";
    	$result=$conn->query($sql);
			if($result->num_rows >0){
			    while ($row =$result->fetch_assoc()) {
				    if($em==$row['Email_ID'] && $ps==$row['Password'] ){
						$_SESSION['username'] = $row['Name'] ;
						$_SESSION['usertype'] = 2 ;
						$_SESSION['Enrollment_Number'] =$row['Enrollment_Number'];
						
                        header("location:Viewable/index.php#");
                    }
                    else{
                    	echo "wrong id/Password";
                    }	       		
			    }
		    }
		    else{
				echo "No record found";
			}		
	break;

	case 2:
	    $sql="select * from teacher_detail";
    	$result=$conn->query($sql);
			if($result->num_rows >0){
			    while ($row =$result->fetch_assoc()) {
				    if($em==$row['Email_ID'] && $ps==$row['Password'] )
                    {
						$_SESSION['username'] = $row['Name'] ;
						$_SESSION['usertype'] = 3 ;
						$_SESSION['Teacher_ID'] =$row['Teacher_ID'];
						
                    	header("location:Viewable/index.php#");
                    }
                    else{
                    	echo "wrong id/Password";
                    }	    		
				}
		    }
		    else{
				echo "No record found";
		    }		       		
	 break;
	}		
}

?>