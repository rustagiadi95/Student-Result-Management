function button1(id)
{

var request = new XMLHttpRequest();
       document.getElementById("display").innerHTML = " " ;

    var url = "../student_function.php?id="+id+"&func="+1;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function()
    {
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById("buttons").innerHTML = "<b>Choose the Semester whose students you want to view:<br></b>&nbsp &nbsp"+result ;
        }
        else{
            document.getElementById("buttons").innerHTML = "server failed to read" ;
        }
    }  
}

function My_Result(id,sem){
    var request = new XMLHttpRequest();
    document.getElementById("display").innerHTML = " " ;
    var url = "../student_function.php?id="+id+"&func="+2+"&sem="+sem;
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

function StudentProfileForm(id){

    var request = new XMLHttpRequest();
               document.getElementById("display").innerHTML = " " ;
               document.getElementById("buttons").innerHTML = " " ;

    var url = "../student_function.php?id="+id+"&func="+3;
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


function Edit_StudentProfile()
{
    var enroll = document.getElementById('enroll').value ;
    var email = document.getElementById('email').value ;
    var contact = document.getElementById('contact').value ;
    var pass = document.getElementById('pass').value ;
    

    var request = new XMLHttpRequest();
  // alert(form.contact.value);
    var url = "../student_function.php?func="+4+"&enroll="+enroll+"&email="+email+"&contact="+contact+"&pass="+pass;
    request.open("GET", url, true) ;
    request.send() ;
    
    request.onreadystatechange=function(){
        if(request.readyState == 4){
            var result = request.responseText ;
             document.getElementById("display").innerHTML = result ;
        }
        
  }

}