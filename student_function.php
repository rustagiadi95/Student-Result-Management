<?php

include("student_dbHandler.php") ;
$cp = new ConnectionProvider() ;

if($_GET['func']==1)
{	 $cp = $cp->readsem($_GET['id']) ;}

if($_GET['func']==2)
{	 $cp = $cp->readResult($_GET['id'],$_GET['sem']) ;}

if($_GET['func']==3)
{	 $cp = $cp->getForm($_GET['id']) ;}

if($_GET['func']==4)
{	 $cp = $cp->editForm($_GET['enroll'],$_GET['email'],$_GET['contact'], $_GET['pass']) ;}

?>