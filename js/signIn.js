var c = 0 ;

function admin() {
   document.getElementById("form").innerHTML = "<form action='../signInProc.php'>"+
   "<input type='hidden' name='hidden' value='0'>" +
    "<div class='form-group'>"+
        "<labe>Email address:</label>"+
        "<input type='email' name='email' class='form-control'>"+
    "</div>"+
    "<div class='form-group'>"+
        "<label>Password:</label>"+
        "<input type='password' name='pass' class='form-control'>"+
    "</div>"+"<br>"+
    "<button class='btn btn-info' type='submit'>Sign In"+
    "</form>" 
    c = 0 ;
    //alert("value of c is :" + c) ;
    this.check() ;
}

function student() {
    document.getElementById("form").innerHTML = "<form action='../signInProc.php'>"+
    "<input type='hidden' name='hidden' value='1'>" +
     "<div class='form-group'>"+
         "<label>Email username:</label>"+
         "<input type='email' name='email' class='form-control'>"+
     "</div>"+
     "<div class='form-group'>"+
         "<label>Password:</label>"+
         "<input type='password' name='pass' class='form-control'>"+
     "</div>"+
     "<button class='btn btn-info' type='submit'>Sign In"+
     "</form>"
     c = 1 ;
     //alert("value of c is :" + c) ;
     this.check() ;
 }

 function teacher() {
    document.getElementById("form").innerHTML = "<form action='../signInProc.php'>"+
    "<input type='hidden' name='hidden' value='2'>" +
     "<div class='form-group'>"+
         "<label>Email address:</label>"+
         "<input type='email' name='email' class='form-control'>"+
     "</div>"+
     "<div class='form-group'>"+
         "<label>Password:</label>"+
         "<input type='password' name='pass' class='form-control'>"+
     "</div>"+
     "<button class='btn btn-info' type='submit'>Sign In"+
     "</form>"
     c = 2 ;
     //alert("value of c is :" + c) ;
    check() ;
 }

 function check() {
     if(c == 0){
         document.getElementById("admin").style = "background-color:blue;color:white" ;
         document.getElementById("student").style = "background-color:none;color:black" ;
         document.getElementById("teacher").style = "background-color:none;color:black" ;
     }
     if(c == 1){
        document.getElementById("admin").style = "background-color:none;color:black" ;
        document.getElementById("student").style = "background-color:blue;color:white" ;
        document.getElementById("teacher").style = "background-color:none;color:black" ;
    }
    if(c == 2){
        document.getElementById("admin").style = "background-color:none;color:black" ;
        document.getElementById("student").style = "background-color:none;color:black" ;
        document.getElementById("teacher").style = "background-color:blue;color:white" ;
    }
 }

