<?php

include("admin_dbHandler.php") ;
$cp = new ConnectionProvider() ;

/* for reading the databases */
if($_GET['func']==1)
    $cp = $cp->readsem() ;
if($_GET['func']==2)
    $cp = $cp->readTeacher();
if($_GET['func']==3)
    $cp = $cp->readStudent() ;
if($_GET['func']==4)
    $cp = $cp->readResult($_GET['sem']) ;
if($_GET['func']==5)
    $cp = $cp->readSuggestions() ; 

/* ----------------------------------------------- */

/* for deleting the records */
if($_GET['del']==1){
    $id = $_GET['id'] ;
    $cp->delete($id, $_GET['del']);
}
if($_GET['del']==2){
    $id = $_GET['id'] ;
    $cp->delete($id, $_GET['del']);
}
if($_GET['del']==3){
    $contact = $_GET['id'] ;
    $cp->delete($contact, $_GET['del']);
}
/* ----------------------------------------------- */

/* for opening the editing form */
if($_GET['edit'] == 1){
    $id = $_GET['id'] ;
    $cp = $cp->edit($id, $_GET['edit']) ;
}
if($_GET['edit'] == 2){
    $id = $_GET['id'] ;
    $cp = $cp->edit($id, $_GET['edit']) ;
}
if($_GET['edit'] == 3){
    $id = $_GET['id'] ;
    $cp = $cp->edit($id, $_GET['edit']) ;
}
if($_GET['edit'] == 7){
    $cp = $cp->editAdmin() ;
}
/* ----------------------------------------------- */

/* for edititing the records */
if($_GET['edit'] == 4){
    $id = $_GET['id'] ;
    $cp = $cp->editSem($id, $_GET['sub1'], $_GET['sub2'], $_GET['sub3'], $_GET['sub4'], $_GET['sub5']) ;
}
if($_GET['edit'] == 5){
    $id = $_GET['id'] ;
    $cp = $cp->editTeacher($id, $_GET['name'], $_GET['email'], $_GET['pass'], $_GET['mobile']) ;
}
if($_GET['edit'] == 6){
    $id = $_GET['id'] ;
    $cp = $cp->editStudent($id, $_GET['name'], $_GET['email'], $_GET['pass'], $_GET['mobile'], $_GET['current_sem']) ;
}
if($_GET['edit'] == 8){
    $pass = $_GET['pass'] ;
    $cp = $cp->editAdminPassword($pass) ;
}
/* ----------------------------------------------- */
?>