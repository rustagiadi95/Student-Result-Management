
<?php
session_start();

    class ConnectionProvider{
        function getDBConnection(){
$conn = new mysqli("localhost","root","","srms");
            if($conn->connect_error){
                die("Connection to the db failed".$conn->connect_error) ;
            }else{
                return $conn ;
            }
   
        }

function readStudent($sem){

            $connection = $this->getDBConnection();
            
            echo "<table class = 'table table-bordered table-hover'>"."<tr><th>Enrollment Number</th><th>Name</th><th>Email</th>".
            "<th>Current Semester</th></tr>" ;

            $sql = "select * from student where Current_Sem = ".$sem ;
            $result = $connection-> query($sql) ;
            while($row=$result->fetch_assoc()){

            	   	echo "<tr><td>".$row['Enrollment_Number']."</td><td>".$row['Name']."</td><td>".$row['Email_ID']."</td>".
                "<td>".$row['Current_Sem']."</td></tr>" ;

            	   }               
            

            echo "</table>" ;
        }
   
    function readsem($id,$calltype){

            $connection = $this->getDBConnection();
            $sql = "select * from teacher_subject where Teacher_ID = ".$id ;
            if($connection->query($sql) ==TRUE)
            {
            $result = $connection-> query($sql) ;
            while($row=$result->fetch_assoc()){
            	   if($calltype ==1){
                    echo "<button type='button' class='btn btn-primary' onclick=' Student_Assigned(".$row['Semester'].")'>Semester".$row['Semester']."</button>"."&nbsp &nbsp &nbsp";
                   }
                   if($calltype==2)
            	   {
                    echo "<button type='button' class='btn btn-primary' onclick=' Student_Result(".$row['Semester'].",".$id.")'>Semester".$row['Semester']."</button>"."&nbsp &nbsp &nbsp";
                   }
                }	      	                 
            }
            else{
                echo "not done";
            }
        }

        function readResult($sem,$id){
            $conn = $this->getDBConnection();
            //echo "Result";
            $sql1 = "select * from teacher_subject where Semester = ".$sem."&& Teacher_ID =".$id ;
            if($conn->query($sql1) ==TRUE)
            {
                $result1=$conn->query($sql1);
                while ($row1=$result1->fetch_assoc())
                 {
                    $sql2="select * from sem_details where Semester = ".$sem;
                    if($conn->query($sql2) ==TRUE)
                    {
                        $result2=$conn->query($sql2);
                        while ($row2=$result2->fetch_assoc())
                         {
                            for ($i=1; $i <=5 ; $i++) 
                            { 
                                if($row1['Subject']== $row2['Subject'.$i])
                                 {  break;
                                 }
                            }
                            echo "<br>";
                            echo "<b>Subject =".$row2['Subject'.$i]."<br>";
                            echo "<table class = 'table table-bordered table-hover'>"."<tr><th>Enrollment Number</th><th>Name</th><th>Marks</th>
                            <th>Action</th></tr>" ;
                            //echo $sem;
                        }
                        $sql4="select * from student where Current_Sem =".$sem;
                        $result4=$conn->query($sql4);
                        while ($row4=$result4->fetch_assoc()) {

                             $sql3="select * from result where Semester =".$sem."&& Enrollment_Number=".$row4['Enrollment_Number'];
                            if($conn->query($sql3) ==TRUE){
                                 $result3=$conn->query($sql3);
                                 while ($row3=$result3->fetch_assoc()){
                                    echo "<tr><td>".$row3['Enrollment_Number']."</td><td>".$row3['Name']."</td><td>".$row3['Res_Sub'.$i]."</td>".
                                     "<td>"."<a href = '#' onclick=' View_Form(".$row3['Semester'].",".$row3['Enrollment_Number'].",".$i.")'>Edit</a>"."</td></tr>" ;
                                 }

                            }
                        }
                           

                        

                    }
                }
            }
            else{
                echo "query1 fails".$conn->error;
            }


        }

        function viewForm($sem,$id,$i)
        {
            $conn = $this->getDBConnection();
            $sql = "select * from result where Enrollment_Number = ".$id."&& Semester= ".$sem;
            $result = $conn-> query($sql) ;
            while($row=$result->fetch_assoc())
            {
               echo "<form >"."<div class='form-group'>".
        "<label>Enrollment_No:</label>".
        "<input type='text' name='enroll' value ='".$row['Enrollment_Number']."' class='form-control' readonly>".
    "</div>".
    "<div class='form-group'>".
        "<label>Name:</label>".
        "<input type='text' name='name' value ='".$row['Name']."' class='form-control' readonly>".
    "</div>".
    "<div class='form-group'>".
        "<label>Semester:</label>".
        "<input type='text' name='sem' value='".$row['Semester']."' class='form-control' readonly>".
    "</div>".
    "<div class='form-group'>".
        "<label>Marks:</label>".
        "<input type='text' name='marks' value='".$row['Res_Sub'.$i]."' class='form-control'>".
    "</div>".
    "<button class='btn btn-info' type='submit' onclick='Edit_Result(this.form,".$i.")'>Edit".
    "</form>";
            }

        }


      function editResult($enroll,$sem,$i,$marks)
      {

            $conn = $this->getDBConnection();
                    //$sql="update student set Name='$name',Password='$pass' where Email='$email' ";

            $sql = "update result set Res_Sub".$i."= '$marks' where Semester = '$sem' and Enrollment_Number ='$enroll'";
           if($conn->query($sql)===TRUE){
            echo "RECORD UPDATED";
           }
           else{
            echo "Query fails".$conn->error;
           }

        }

        function viewProfileForm($id){
            $conn = $this->getDBConnection() ;
            $result1 = $conn->query("select * from teacher_detail where Teacher_ID = '$id'") ;
            $row1=$result1->fetch_assoc(); 
            echo "<b>Your  Teacher  ID = $id</b><br>".
                 "<form>".
                 "<div class = 'form-group'>".
                 "<label>Name:</label><br>".
                 "<input type='text' id='name' class = 'form-control' value = '".$row1['Name']."'readonly><br>".
                 "</div>".
                 "<div class = 'form-group'>".
                 "<label>Email:</label><br>".
                 "<input type='text' id='email' class = 'form-control' value = '".$row1['Email_ID']."'><br>".
                 "</div>".
                 "<div class = 'form-group'>".
                 "<label>Password:</label><br>".
                 "<input type='text' id='pass' class = 'form-control' value = '".$row1['Password']."'><br>".
                 "</div>".
                 "<div class = 'form-group'>".
                 "<label>Contact No:</label><br>".
                 "<input type='text' id='contact' class = 'form-control' value = '".$row1['Mobile_No']."'><br>".
                 "</div>"."</form>";
            echo "<button type='button' class='btn btn-primary' onclick='Edit_TeacherProfile(".$id.")'>Submit</button>";

                 
                 
        }

    
         function editProfile($email,$pass,$contact,$teacherID){
            $connection = $this->getDBConnection() ;
            $sql = "update teacher_detail set Email_ID='".$email."', Password='".$pass."', Mobile_No='".$contact."' where Teacher_ID = ".$teacherID."" ;
            if($connection->query($sql) ===TRUE){
                echo "<h3>PROFILE UPDATED</h3>";
            }
            else{
                $connection->error;
            }
            
         }

    
    }
    
    ?>