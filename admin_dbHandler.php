<?php
    class ConnectionProvider{
        function getDBConnection(){
            $conn = new mysqli("localhost", "root", "", "srms") ;
            if($conn->connect_error){
                die("Connection to the db failed".$conn->connect_error) ;
            }else{
                return $conn ;
            }
        }

        function readSem(){
            $connection = $this->getDBConnection();
            $sql = "select * from sem_details" ;
            $result = $connection-> query($sql) ;
            echo "<table class = 'table table-bordered table-hover'>"."<tr><th>Semester</th><th>Subject 1</th><th>Subject 2</th>".
            "<th>Subject 3</th><th>Subject 4</th><th>Subject 5</th>"."<th>Action</th></tr>" ;
            while($row=$result->fetch_assoc()){
                echo "<tr><th>".$row['Semester']."</th><th>".$row['Subject1']."</th><th>".$row['Subject2']."</th>".
                "<th>".$row['Subject3']."</th><th>".$row['Subject4']."</th><th>".$row['Subject5']."</th>".
                "<th><a href = '#' onclick='AdminEdit(".$row['Semester'].", 1)'>Edit</a></th></tr>" ;
            }
            echo "</table>" ;
        }

        function readTeacher(){
            $connection = $this->getDBConnection();
            $sql = "select * from teacher_detail" ;
            $result = $connection-> query($sql) ;
            if($result->num_rows>0){
                echo "<table class = 'table table-bordered table-hover'>"."<tr><th>Teacher ID</th><th>Name</th><th>Email</th>".
                "<th>Contact No</th><th>Action 1</th>"."<th>Action 2</th></tr>" ;
                while($row=$result->fetch_assoc()){
                    echo "<tr><th>".$row['Teacher_ID']."</th><th>".$row['Name']."</th><th>".$row['Email_ID']."</th>".
                    "<th>".$row['Mobile_No']."</th><th><a href = '#' onclick='AdminDelete(".$row['Teacher_ID'].", 1)'>Delete</a></th>".
                    "<th><a href = '#' onclick='AdminEdit(".$row['Teacher_ID'].", 2)'>Edit</a></th></tr>" ;
                }
                echo "</table>" ;        
            }else{
                echo "<b>NO TEACHER FOUND</b>" ;
            }
        }

        function readStudent(){
            $connection = $this->getDBConnection();
            $sql = "select * from student" ;
            $result = $connection-> query($sql) ;
            if($result->num_rows > 0){
                echo "<table class = 'table table-bordered table-hover'>"."<tr><th>Enrollment Number</th><th>Name</th><th>Email</th>".
                "<th>Contact No</th><th>Current Semester</th>"."<th>Action 1</th><th>Action 2</th></tr>" ;
                while($row=$result->fetch_assoc()){
                    echo "<tr><th>".$row['Enrollment_Number']."</th><th>".$row['Name']."</th><th>".$row['Email_ID']."</th>".
                        "<th>".$row['Mobile_No']."</th><th>".$row['Current_Sem']."</th><th><a href = '#' onclick='AdminDelete(".$row['Enrollment_Number'].", 2)'>Delete</a></th>".
                        "<th><a href = '#' onclick='AdminEdit(".$row['Enrollment_Number'].", 3)'>Edit</a></th></tr>" ;
                }
                echo "</table>" ;
            }
            else{
                echo "NO STUDENT FOUND" ;
            }
        }

        function readResult($semNo){
            $connection = $this->getDBConnection();
            $sql1 = "select * from sem_details where Semester = $semNo" ;
            $sql2 = "select * from result where Semester = $semNo" ;
            $result1 = $connection->query($sql1) ;
            $row1 = $result1->fetch_assoc() ;
            echo "<b>Showing result of Semester : $semNo</b><br><br>" ;
            echo "<table class = 'table table-bordered table-hover table-responsive'>"."<tr><th>Enrollment Number</th><th>Current Semester</th><th>Name</th>".
                 "<th>".$row1['Subject1']."</th><th>".$row1['Subject2']."</th>"."<th>".$row1['Subject3']."</th><th>".$row1['Subject4']."</th>".
                 "<th>".$row1['Subject5']."</th></tr>" ;
            $result2 = $connection->query($sql2) ;
            while ($row2 = $result2->fetch_assoc()) {
                $sql3 = "select Current_Sem from student where Name = '".$row2['Name']."'" ;
                $result3 = $connection->query($sql3) ;
                $row3 = $result3->fetch_assoc() ;
                echo "<tr><td><b>".$row2['Enrollment_Number']."</b></td><td><b>".$row3['Current_Sem']."</b></td><td><b>".$row2['Name']."</b></td>".
                "<td><b>".$row2['Res_Sub1']."</b></td><td><b>".$row2['Res_Sub2']."</b></td><td><b>".$row2['Res_Sub3']."</b></td><td><b>".$row2['Res_Sub4']."</b></td><td><b>".$row2['Res_Sub5']."</b></td></tr>" ;
            }
                echo "</table>" ;

        }

        function readSuggestions(){
            $connection = $this->getDBConnection() ;
            $sql = "select * from contactus" ;
            $result = $connection->query($sql) ;
            echo "<table class = 'table table-hover table-bordered table-responsive'>".
                 "<tr><th>Name</th><th>Email</th><th>Contact No.</th><th>Suggestions</th><th>Delete</th></tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr><th>".$row['Name']."</th><th>".$row['Email_ID']."</th><th>".$row['Mobile_No']."</th>".
                "<th>".$row['Suggestion']."</th><th><a href = '#' onclick='AdminDelete(".$row['Mobile_No'].", 3)'>Delete</a></th></tr>" ;
            }
            echo "</table>" ;
        }

        function delete($id, $type){
            $connection = $this->getDBConnection() ;
            if($type == 1){
                $sql = "delete from teacher_detail where Teacher_ID = ".$id ;
                $result = $connection->query($sql) ;
                echo "<b>TEACHER DELETED</b><br></br>" ;
                $this->readTeacher() ;
            }
            if($type == 2){
                $sql = "delete from student where Enrollment_Number = ".$id ;
                $result = $connection->query($sql) ;
                echo "<b>STUDENT DELETED</b><br></br>" ;
                $this->readStudent() ;
            }
            if($type == 3){
                $sql = "delete from contactus where Mobile_No = ".$id ;
                $result = $connection->query($sql) ;
                echo "<b>SUGGESTION DELETED</b><br><br>" ;
                $this->readSuggestions() ;
            }
        }

        function edit($id, $type){
            $connection = $this->getDBConnection() ;
            if($type == 1){
                $sql = "Select * from sem_details where semester = ".$id ;
                $result = $connection->query($sql) ;
                $row = $result->fetch_assoc() ;
                echo "<form>".
                "<div class = 'form-group'>".
                    "<label>Edit Semester ".$row['Semester']." </label><br><br>".
                    "<div class = 'form-group'>".
                    "<label>Subject 1 :</label>".
                    "<input class = 'form-control' id = 'sub1' type = 'text' value = '".$row['Subject1']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Subject 2 :</label><br>".
                    "<input class = 'form-control' id = 'sub2' type = 'text' value = '".$row['Subject2']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Subject 3 :</label><br>".
                    "<input class = 'form-control' id = 'sub3' type = 'text' value = '".$row['Subject3']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Subject 4 :</label><br>".
                    "<input class = 'form-control' id = 'sub4' type = 'text' value = '".$row['Subject4']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Subject 5 :</label><br>".
                    "<input class = 'form-control' id = 'sub5' type = 'text' value = '".$row['Subject5']."'><br>".
                    "</div>".
                    "<button class = 'btn btn-info' type = 'button' onclick = 'Edit(".$id.", 4)' >Edit</button><br>".
                "</form>" ;
            }
            if($type == 2){
                $sql = "Select * from teacher_detail where Teacher_ID = ".$id ;
                $result = $connection->query($sql) ;
                $row = $result->fetch_assoc() ;
                echo "<form>".
                "<div class = 'form-group'>".
                    "<label>Edit Teacher with ID ".$row['Teacher_ID']." </label><br><br>".
                    "<div class = 'form-group'>".
                    "<label>Name :</label>".
                    "<input class = 'form-control' id = 'name' type = 'text' value = '".$row['Name']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Email :</label><br>".
                    "<input class = 'form-control' id = 'email' type = 'email' value = '".$row['Email_ID']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Password :</label><br>".
                    "<input class = 'form-control' id = 'pass' type = 'text' value = '".$row['Password']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Contact Number :</label><br>".
                    "<input class = 'form-control' id = 'mobile' type = 'text' value = '".$row['Mobile_No']."'><br>".
                    "</div>".
                    /* "<div class = 'form-group'>".
                    "<label>Subject 5 :</label><br>".
                    "<input class = 'form-control' type = 'text' value = ".$row['Subject5']."><br>".
                    "</div>". */
                    "<button class = 'btn btn-info' type = 'button' onclick = 'Edit(".$id.", 5)' >Edit</button><br>".
                "</form>" ;
            }
            if($type == 3){
                $sql = "Select * from student where Enrollment_Number = ".$id ;
                $result = $connection->query($sql) ;
                $row = $result->fetch_assoc() ;
                echo "<form>".
                "<div class = 'form-group'>".
                    "<label>Edit Student with Enrollment Number ".$row['Enrollment_Number']." </label><br><br>".
                    "<div class = 'form-group'>".
                    "<label>Name :</label>".
                    "<input class = 'form-control' id = 'name' type = 'text' value = '".$row['Name']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Email :</label><br>".
                    "<input class = 'form-control' id = 'email' type = 'email' value = '".$row['Email_ID']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Password :</label><br>".
                    "<input class = 'form-control' id = 'pass' type = 'text' value = '".$row['Password']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Contact Number :</label><br>".
                    "<input class = 'form-control' id = 'mobile' type = 'text' value = '".$row['Mobile_No']."'><br>".
                    "</div>".
                    "<div class = 'form-group'>".
                    "<label>Current Semester :</label><br>".
                    "<input class = 'form-control' id = 'current_sem' type = 'text' value = ".$row['Current_Sem']."><br>".
                    "</div>".
                    "<button class = 'btn btn-info' type = 'button' onclick = 'Edit(".$id.", 6)' >Edit</button><br>".
                "</form>" ;
            } 
        }

        function editSem($id, $sub1, $sub2, $sub3, $sub4, $sub5){
            $connection = $this->getDBConnection() ;
            $sql = "update sem_details set Subject1='".$sub1."', Subject2='".$sub2."', Subject3='".$sub3."', Subject4='".$sub4."', Subject5 = '".$sub5."' where Semester = ".$id."" ;
            $result = $connection->query($sql) ;
            $this->readSem() ;
        }

        function editTeacher($id, $name, $email, $pass, $mobile){
            $connection = $this->getDBConnection() ;
            $sql = "update teacher_detail set Name='".$name."', Email_ID='".$email."', Password='".$pass."', Mobile_No='".$mobile."' where Teacher_ID = ".$id."" ;
            $result = $connection->query($sql) ;
            echo "<b style='font-size:30px'>Teacher Edited</b>" ;
            //$this->readTeacher() ;
        }

        function editStudent($id, $name, $email, $pass, $mobile, $sem){
            $connection = $this->getDBConnection() ;
            $sql = "update student set Name='".$name."', Email_ID='".$email."', Password='".$pass."', Mobile_No='".$mobile."', Current_Sem='".$sem."' where Enrollment_Number = ".$id."" ;
            $result = $connection->query($sql) ;
            echo "<b style='font-size:30px'>Student Edited</b>" ;
            //$this->readStudent() ;
        }

        function editAdmin(){
            $connection = $this->getDBConnection() ;
            $sql = "Select * from admin" ;
            $result = $connection->query($sql) ;
            $row=$result->fetch_assoc() ;
            echo "<form>".
                "<label>Type New Password :  </label><br>".
                "<input class = 'form-control' type = 'text' id = 'pass' value='".$row['Password']."'>".
                "</div>"."<br>".
                "<button type='button' class = 'btn btn-default' onclick='updatePass()'>Update</button>".
                "</form>" ;                
        }

        function editAdminPassword($pass){
            $connection = $this->getDBConnection() ;
            $sql = "update admin set Password = '".$pass."'" ;
            $connection->query($sql) ;
            echo "<b style='font-size:30px'>Password Changed</b>" ; 
        }
    }
?>