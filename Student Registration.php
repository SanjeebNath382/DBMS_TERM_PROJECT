<?php 

session_start();
if(isset($_POST['submit'])){
    //echo"hiiiiiiiiiii";
    $server= "localhost";
    $username="root";
    $password="";
    $con= mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection not made due to".mqsqli_connect_error());
    }
    // else{
    //     echo "Successfully Connected";
    // }
    $semester= $_POST['semester'];
    $campus= $_POST['campus'];
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $sid=$_POST['sid'];
   $password=$_POST['password'];
   $adderess=$_POST['adderess'];
   $phone=$_POST['ph'];
   $dob=$_POST['dob'];
   $securepass= crypt($password,$sid);
   //echo $campus;
   //echo $semester;
   $sql= "INSERT INTO `dowell university`.`students` (`FirstName`, `LastName`, `Email`, `SID`, `Password`, `Adderess`, `PhoneNumber`, `DOB`,`semester`, `campus`,`Date of Registration`) VALUES ('$fname', '$lname', '$email', '$sid', '$securepass', '$adderess', '$phone', '$dob', '$semester','$campus',current_timestamp());";
//    $q = " select * from students where Student ID = $sid  ";
//    $result= mysqli_query($con,$q);
   
//    if($result)  echo "<h4 style='color:red>User already exists</h4>";
//    echo " Result:$result";
   
   if($con->query($sql) == true){
        echo "<h3 style='margin-left:400px;margin-top:20px;color:green' >You have successfully registered<a href='Login.php'>Go back to Login Page</a></h3>";
   }
   else{
       echo "ERROR: $con->error";
   }
   $con->close();

}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>



    <script>
       $(function () {
       $('#datetimepicker1').datetimepicker();
      });
    </script>

    <link rel="stylesheet" href="Registration.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <body style="background-color:#fff">
       <div class="header" style="background-color:white">
         <img src="./images/logo2.jpeg" alt="logo" style="height:100px;width:400px">
         <div class="header-right">
           <a href="Home.php">Home</a>
           <a href="Login.php">Login</a>
           <a href="#">Contact</a> <!--You can a page containing containing contact details-->
          </div>
      </div>
      <form id="regform" method="post">
      <h2 style="margin-left:680px">Register</h2>
        <div style="margin-top:35px;background-color:#E27D60;border-radius: 5px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);overflow: hidden;width: 400px;max-width: 100%;" class="container">
                <div class="form-row">
                        <div class="col">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="sid">Student ID</label>
                        <input type="text" class="form-control" placeholder="Student ID" id="sid" name="sid" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="password" data-toggle="tooltip" title="The password should be 6 to 12 characters in length. It should contain 1 lowercase and 1 uppercase letter and of the special character !@#$%^%">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="ph">Phone Number(optional)</label>
                        <input type="text" class="form-control" placeholder="Phone Number" id="ph" name="ph" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="adderess">Adderess(optional)</label>
                        <input type="text" class="form-control" placeholder="Adderess" id="adderess" name="adderess" required/>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <label for="dob">Date OF Birth(optional)</label>
                        <input type="date" class="form-control" placeholder="Date Of Birth" id="dob" name="dob" required/>
                        </div>
                </div>
                
                <div class="form-row">
                        <div class="col">
                            <label for="semester">Semester</label>
                            <div class="input-group">
                                <select class="custom-select mb-3" id="semester" name="semester">
                                <option  selected>Choose</option>
                                <option value="One">One</option>
                                <option value="Two">Two</option>
                                <option value="Spring School">Spring School</option>
                                <option value="Winter School">Winter School</option>
                            

                                </select>


                            </div>
    
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                            <label for="campus">Campus</label>
                            <div class="input-group">
                                <select class="custom-select mb-3" id="campus" name="campus">
                                <option  selected>Choose</option>
                                <option value="Pandora">Pandora</option>
                                <option value="Riverdell">Riverdell</option>
                                <option value="Neverland">Neverland</option>
                                
                            

                                </select>


                            </div>
    
                        </div>
                </div>
                <div class="form-row">
                        <div class="col">
                        <button  class="btn btn-primary" action="submit" name="submit"  style="width:100px;margin-top:20px" >Submit</button>
                        </div>
                </div>
                
                
                
                
        </div>

      </form>

        
    </body>
   
</html>