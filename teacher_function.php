<?php
include("teacher_dbHandler.php") ;
$cp = new ConnectionProvider() ;

if($_GET['type']==1)
{	 $cp = $cp->readsem($_GET['id'],$_GET['calltype']) ;}

if($_GET['type']==2)
{$cp = $cp->readstudent($_GET['sem']) ;}

if($_GET['type']==3)
{$cp = $cp->readResult($_GET['sem'],$_GET['id']) ;}

if($_GET['type']==4)
{$cp = $cp->viewForm($_GET['sem'],$_GET['id'],$_GET['i']) ;
}

if($_GET['type']==5)
{
	$cp=$cp->editResult($_GET['enroll'],$_GET['sem'],$_GET['i'],$_GET['marks']);
}

if($_GET['type'] == 6){
	$cp=$cp->viewProfileForm($_GET['id']) ;
}

if($_GET['type'] == 7){
	$cp=$cp->editProfile($_GET['email'],$_GET['pass'],$_GET['contact'],$_GET['teacherID']) ;
}

?>

