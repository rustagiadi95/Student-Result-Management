function buttons(id,calltype)
{
   
   document.getElementById("display").innerHTML = " " ;

  var request = new XMLHttpRequest();
   
    var url = "../teacher_function.php?id="+id+"&type="+1+"&calltype="+calltype;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function()
    {
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById("buttons").innerHTML = "<b>Choose the Semester whose students you want to view:</b>&nbsp &nbsp"+result ;
        }
        else{
            document.getElementById("buttons").innerHTML = "server failed to read" ;
        }
    }


    
}


function Student_Assigned(sem) {
    
    var request = new XMLHttpRequest();
   
    var url = "../teacher_function.php?sem="+sem+"&type="+2;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById("display").innerHTML = result ;
        }
        else{
            document.getElementById("display").innerHTML = "server failed to read" ;
        }
    } 


}

function Student_Result(sem,id) 
{
    
    var request = new XMLHttpRequest();
   
    var url = "../teacher_function.php?sem="+sem+"&type="+3+"&id="+id;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function()
    {
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById("display").innerHTML = result ;
        }
        else{
            document.getElementById("display").innerHTML = "server failed to read" ;
        }
    } 
}

  function View_Form(sem,id,i)
  {
   
    var request = new XMLHttpRequest();
   
    var url = "../teacher_function.php?sem="+sem+"&type="+4+"&id="+id+"&i="+i;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById("display").innerHTML = result ;
        }
        else{
            document.getElementById("display").innerHTML = "server failed to read" ;
        }
  }
}

  function Edit_Result(form,i)
  {
   
    var request = new XMLHttpRequest();
   
    var url = "../teacher_function.php?type="+5+"&enroll="+form.enroll.value+"&sem="+form.sem.value+"&marks="+form.marks.value
    +"&i="+i;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function(){
        if(request.readyState == 4){
            var result = request.responseText ;
             document.getElementById("display").innerHTML = result ;
        }
        
  }
}

  function EditTeacherForm(teacherID){    
    document.getElementById("buttons").innerHTML = "<h3>Enter your Details: </h3>";
     var request = new XMLHttpRequest() ;
     var url = "../teacher_function.php?type="+6+"&id="+teacherID ;
     request.open("GET", url, true) ;
     request.send() ;

     request.onreadystatechange = function(){
         if(request.readyState == 4){
             var result = request.responseText ;
             document.getElementById("display").innerHTML = result;
         }
     }
 }

 function Edit_TeacherProfile(teacherID){
 document.getElementById("buttons").innerHTML = " ";

 var pass=document.getElementById('pass').value;
var email=document.getElementById('email').value;
var contact=document.getElementById('contact').value;

var request = new XMLHttpRequest();
            
 var url = "../teacher_function.php?pass="+pass+"&type="+7+"&email="+email+"&contact="+contact+"&teacherID="+teacherID;
 request.open("GET", url, true) ;
 request.send() ;
 
 request.onreadystatechange=function()
 {
     if(request.readyState == 4){
         var result = request.responseText ;
         document.getElementById("display").innerHTML = result ;
     }
     else{
         document.getElementById("display").innerHTML = "server failed to read" ;
     }
 }  

 }
