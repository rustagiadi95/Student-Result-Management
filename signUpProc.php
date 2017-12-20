<?php
$nm=$_GET['name'];
$em=$_GET['email'];
$ps=$_GET['pass'];
$ph=$_GET['phone'];
$user=$_GET['hidden'];

$conn = new mysqli("localhost","root","","srms");
if($conn->connect_error){
	die("connection failed" .$conn->connect_error);
	}
else{
	echo $user ;
	switch ($user){
	case '0':
		echo "admin";
		break;
	
		case '1':
		
	    $sem=$_GET['sem'];
	    $sql="insert into student(Name,Email_ID,Password,Mobile_No,Current_Sem) values('$nm','$em','$ps','$ph','$sem')";
		if($conn->query($sql) ===TRUE)
		{
        	$sql2="select * from student where Email_ID='$em'";
			if($conn->query($sql2) == TRUE)
			   {
                     $result = $conn-> query($sql2) ;
                      while ($row= $result->fetch_assoc()) 
                      {
                      	for ($i=1; $i <=$sem; $i++) 
                      	{ 
                      		 $sql3="insert into result(Enrollment_Number,Name,Semester) values(".$row['Enrollment_Number'].",'$nm','$i')";
                             if($conn->query($sql3) ===TRUE){
                             	continue;
                             }
                             else{
                             	echo "Query3 failes".$conn->error;
                             	
                             }
                      	}
                      
		                header("location:Viewable/signin.php");
		            }
                }
		    else{
		    	echo "Query2 failes".$conn->error;
		        }
		}
			
		else{
			echo "Query1 failes".$conn->error;
		}
		break;


	case '2':
		//echo "Teacher";
	    $sql="insert into teacher_detail(Name,Email_Id,Password,Mobile_No) values('$nm','$em','$ps','$ph')";
		if($conn->query($sql) ===TRUE){
		header("location:Viewable/signin.php");
		//echo "Query sent";
		}
		else{
			echo "Query failes".$conn->error;
		}
		break;
}

}

		

?>