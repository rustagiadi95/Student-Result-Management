    function AdminRead(type) {
    document.getElementById("buttons").innerHTML = "" ;
    var request = new XMLHttpRequest();
    if(type == 1){
        document.getElementById("buttons").innerHTML = "<h3><b>Semester Details : </b></h3>" ;
        var url = "../admin_functions.php?func=1&del=0&edit=0" ;
    }
       
    if(type == 2){
        document.getElementById("buttons").innerHTML = "<h3><b>Teacher Details : </b></h3>" ;
        var url = "../admin_functions.php?func=2&del=0&edit=0" ;
    }
       
    if(type == 3){
        document.getElementById("buttons").innerHTML = "<h3><b>Student Details : </b></h3>" ;
        var url = "../admin_functions.php?func=3&del=0&edit=0" ;
    }
        
    if(type == 5){
        document.getElementById("buttons").innerHTML = "<h3><b>Suggestions : </b></h3>" ;
        var url = "../admin_functions.php?func=5&del=0&edit=0" ;
    }
        
    
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

function AdminUpdate() {
    document.getElementById("buttons").innerHTML = "<h3><b>Admin Profile : </b></h3>" ;
    var request = new XMLHttpRequest() ;
    var url = "../admin_functions.php?func=0&del=0&edit=7" ;
    request.open("GET", url, true) ;
    request.send() ;
    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById('display').innerHTML = result ;
        }
        else{
            document.getElementById('display').innerHTML = "Server failed to fetch data" ;
        }
    }
}
function AdminDelete(ID, type){
    document.getElementById("buttons").innerHTML = "" ;
    var request = new XMLHttpRequest();
    if(type == 1){
        document.getElementById("buttons").innerHTML = "<h3><b>Teacher Details : </b></h3>" ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=1&edit=0" ;
    }
    if(type == 2){
        document.getElementById("buttons").innerHTML = "<h3><b>Student Details : </b></h3>" ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=2&edit=0" ;
    }
        
    if(type == 3){
        document.getElementById("buttons").innerHTML = "<h3><b>Suggestions : </b></h3>" ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=3&edit=0" ;
       
    }
    request.open("GET", url, true) ;
    request.send() ;
    request.onreadystatechange=function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById('display').innerHTML = result ;
        }
        else{
            document.getElementById('display').innerHTML = "server failed to delete" ;
        }
    }
}

function AdminEdit(ID, type){
    document.getElementById("buttons").innerHTML = "" ;
    var request = new XMLHttpRequest() ;
    if(type == 1){
        document.getElementById("buttons").innerHTML = "<h3><b>Semester Details : </b></h3>" ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=0&edit=1" ;
    }
    if(type == 2){
        document.getElementById("buttons").innerHTML = "<h3><b>Teacher Details : </b></h3>" ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=0&edit=2" ;
    }
    if(type == 3){
        document.getElementById("buttons").innerHTML = "<h3><b>Student Details : </b></h3>" ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=0&edit=3" ;
    }
    request.open("GET", url, true) ;
    request.send() ;
    request.onreadystatechange=function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById('display').innerHTML = result ;
        }
        else{
            document.getElementById('display').innerHTML= "Server failed to edit" ;
        }
    }
}

function Edit(ID, type){
    var request = new XMLHttpRequest() ;
    if(type == 4){
        var sub1 = document.getElementById('sub1').value ;
        var sub2 = document.getElementById('sub2').value ;
        var sub3 = document.getElementById('sub3').value ;
        var sub4 = document.getElementById('sub4').value ;
        var sub5 = document.getElementById('sub5').value ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=0&edit=4&sub1="
                  +sub1+"&sub2="+sub2+"&sub3="+sub3+"&sub4="+sub4+
                  "&sub5="+sub5 ; 
    }
    if(type==5){
        var name = document.getElementById('name').value ;
        var email = document.getElementById('email').value ;
        var pass = document.getElementById('pass').value ;
        var mobile = document.getElementById('mobile').value ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=0&edit=5&name="
                  +name+"&email="+email+"&pass="+pass+"&mobile="+mobile; 
    }
    if(type==6){
        var name = document.getElementById('name').value ;
        var email = document.getElementById('email').value ;
        var pass = document.getElementById('pass').value ;
        var mobile = document.getElementById('mobile').value ;
        var sem = document.getElementById('current_sem').value ;
        var url = "../admin_functions.php?func=0&id="+ID+"&del=0&edit=6&name="
                  +name+"&email="+email+"&pass="+pass+"&mobile="+mobile+"&current_sem="+sem; 
    }
    request.open("GET", url, true) ;
    request.send() ;
    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById('display').innerHTML = result ;
        }
        else{
            document.getElementById('display'.innerHTML = "server failed to edit") ;
        }
    }
}

function updatePass(){
    var pass = document.getElementById('pass').value ;
    var request = new XMLHttpRequest() ;
    var url = "../admin_functions.php?func=0&del=0&edit=8&pass="+pass ;
    request.open("GET", url, true) ;
    request.send() ;
    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById('display').innerHTML = result ;
        }
        else{
            document.getElementById('display').innerHTML = "Server failed to update admin's password" ;
        }
    }
}

function saveSuggest(){
    //document.getElementById('acknowledge').innerHTML = "i work" ;
    var name = document.getElementById('name').value ;
    var email = document.getElementById('email').value ;
    var mob = document.getElementById('mob').value ;
    var msg = document.getElementById('msg').value ;
    
    var request = new XMLHttpRequest() ;
    var url = "../message.php?name="+name+"&email="+email+"&mob="+mob+"&msg="+msg ;
    request.open("GET", url, true) ;
    request.send() ;
    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var result = request.responseText ;
            document.getElementById('acknowledge').innerHTML = result ; 
        }
        else{
            document.getElementById('acknowledge').innerHTML = 'query not submitted' ;
        }
    } 
}

function Button() {
    document.getElementById("display").innerHTML = "" ;
    document.getElementById("buttons").innerHTML = 
    "<h3><b>Choose a semester to show its result :  </b></h3><br>"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(1)'>Semester 1</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(2)'>Semester 2</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(3)'>Semester 3</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(4)'>Semester 4</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(5)'>Semester 5</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(6)'>Semester 6</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(7)'>Semester 7</button> &nbsp&nbsp"+
    "<button class = 'btn btn-info'type='button' onclick = 'fetchSemResult(8)'>Semester 8</button> &nbsp&nbsp" ;
}

function fetchSemResult(semNo){
    var request = new XMLHttpRequest() ;
    var url = "../admin_functions.php?func=4&edit=0&del=0&sem="+semNo ;
    request.open("GET", url, true) ;
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var response = request.responseText ;
            document.getElementById('display').innerHTML = response ;
        }
        else{
            document.getElementById('display').innerHTML = "Server failed to fetch" ;
        }
    }
    
}