<?php
$nm=$_GET['name'];
$em=$_GET['email'];
$mb=$_GET['mob'];
$s1=$_GET['msg'];
$conn = new mysqli("localhost","root","","srms");
$sql="insert into contactus values('$nm','$em','$mb','$s1')";
if($conn->connect_error){
	die("connection failed" .$conn->connect_error);
}else{
		if($conn->query($sql)){
			 echo "Suggestion Submitted" ;
		}
		else{
			echo "Query failed".$conn->error;
		}
	}
?>