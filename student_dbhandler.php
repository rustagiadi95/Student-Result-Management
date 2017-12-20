<?php
    class ConnectionProvider{
        function getDBConnection(){
            $conn = new mysqli("localhost","root","","srms");
            if($conn->connect_error){
                die("Connection to the db failed".$conn->connect_error) ;
            }else{
                return $conn ;
            }
        }
         
         function readsem($id){
         	 $connection = $this->getDBConnection();
            $sql = "select * from result where Enrollment_Number = ".$id ;
            $result = $connection-> query($sql) ;
            while($row=$result->fetch_assoc())
            {
                    echo "<button type='button' class='btn btn-primary' onclick=' My_Result(".$id.",".$row['Semester'].")'>Semester".$row['Semester']."</button>"."&nbsp &nbsp &nbsp";
                               	      	                 
            }
         }

         function readResult($id,$sem){
         	 $connection = $this->getDBConnection();
         	 $sql1="select * from sem_details where Semester = '$sem' ";
         	 $result1 = $connection-> query($sql1) ;

             while ($row1=$result1->fetch_assoc()) {
             	echo "<table class = 'table table-bordered table-hover'>"."<tr><th>Enrollment Number</th><th>Name</th><th>".$row1['Subject1']."</th><th>".$row1['Subject2']."</th><th>".$row1['Subject3']."</th><th>".$row1['Subject4']."</th><th>".$row1['Subject5']."</th></tr>" ;
             	
                $sql2 = "select * from result where Enrollment_Number ='$id' and Semester = '$sem' " ;
            $result2 = $connection-> query($sql2) ;
            
            while ($row2=$result2->fetch_assoc()) {
            	echo "<tr><th>".$row2['Enrollment_Number']."</th><th>".$row2['Name']."</th><th>".$row2['Res_Sub1']."</th><th>".$row2['Res_Sub2']."</th><th>".$row2['Res_Sub3']."</th><th>".$row2['Res_Sub4']."</th><th>".$row2['Res_Sub5']."</th></tr>" ;
            }
             }
            
            echo "</table>";
         }

         function getForm($id){
            $conn = $this->getDBConnection();
            $sql = "select * from student where Enrollment_Number = '$id'";
            if($conn->query($sql)==TRUE){
                            $result=$conn->query($sql);

            while ($row=$result->fetch_assoc()) {
            echo  "<form >"."<div class='form-group'>".
        "<label><b>Enrollment_No:</b></label>".
        "<input type='text' id='enroll' value ='".$row['Enrollment_Number']."' class='form-control' readonly>".
    "</div>".
    "<div class='form-group'>".
        "<label><b>Name:</b></label>".
        "<input type='text' id='name' value ='".$row['Name']."' class='form-control' readonly>".
    "</div>".
    "<div class='form-group'>".
        "<label><b>Email ID:</b></label>".
        "<input type='email' id='email' value='".$row['Email_ID']."' class='form-control'>".
    "</div>".
    "<div class='form-group'>".
        "<label><b>Password:</b></label>".
        "<input type='text' id='pass' value='".$row['Password']."' class='form-control'>".
    "</div>".
    "<div class='form-group'>".
        "<label><b>Semester:</b></label>".
        "<input type='text' id='sem' value='".$row['Current_Sem']."' class='form-control' readonly>".
    "</div>".
    "<div class='form-group'>".
        "<label><b>Contact No.</b></label>".
        "<input type='text' id='contact' value='".$row['Mobile_No']."' class='form-control'>".
    "</div>".
    "<button class='btn btn-info' type='submit' onclick='Edit_StudentProfile()'><b>Submit</b>".
    "</form>";
            }
            }
            else{
                echo "Query failed".$conn->error;
            }
            
         }

    
    function editForm($id,$email,$contact,$pass){
        $conn = $this->getDBConnection();
        $sql="update student set Email_ID='".$email."', Mobile_No='".$contact."', Password='".$pass."' where Enrollment_Number=".$id."";
        if ($conn->query($sql)==TRUE) {
          echo "Query Updated";

        }
        else{
            echo "Query Fails".$conn->error;
        }

    }

     }


?>     