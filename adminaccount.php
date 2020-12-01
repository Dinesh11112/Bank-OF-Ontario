<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Welcome to Bank Of Ontario, a global bank in Canada & the Americas. Get bank accounts, loans, mortgages, & more."/>
    <meta name="keywords" content="Bank, Finance, Loans, Credit"/>
    <link rel="shortcut icon" href="images/logoB.png"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Bank Of Ontario</title>
</head>
<body>
    <?php include 'userheader.php';?>
    <main>
    <?php include 'headerimage.php';?>
    <h2> Welcome Admin </h2>
    <?php

        $hold = "Freeze";
        if(isset($_POST['accept'])){

            $ID = $_POST['param'];

            $signupdataquery = "SELECT * from signup_req where ID = '$ID'";
                $signupdata = mysqli_query($dbc,$signupdataquery);
                while($data = mysqli_fetch_array($signupdata)){
                    $username = $data['username'];
                    $password = $data['password'];
                    $emailid = $data['emailid'];
                    $firstname = $data['firstname'];
                    $lastname = $data['lastname'];
                    $phone = $data['phone'];
                    $DOB = $data['DOB'];
                    $SIN = $data['SIN'];
                    $address = $data['address'];
                }
                $lastrowid = $dbc->query('SELECT ID FROM user_authentication ORDER BY ID DESC LIMIT 1');
          while($row = $lastrowid->fetch_assoc()){
            $lastid = $row['ID'];
          }
          $lastid++;

          $num0 = 2020;
            $num1 = $DOB;
            $num2 = (rand(1000,9999));
            $randnum = $num0 . $num1 . $num2;


        $query = "INSERT into user_authentication values($lastid,'$username','$password','$emailid')";
        $query_reader = mysqli_query($dbc,$query);
        $query = "INSERT into personal_info values($lastid,'$firstname','$lastname','','$phone','$emailid','$DOB','$address','$SIN','$username')";
        $query_reader = mysqli_query($dbc,$query);
        $query = "INSERT into account_info values($lastid,'$firstname','$randnum',2000,'$emailid','online')";
        $query_reader = mysqli_query($dbc,$query);
        $query = "DELETE FROM signup_req where ID = '$ID'";
        $query_reader = mysqli_query($dbc,$query);
        }

        if(isset($_POST['reject'])){
            $ID = $_POST['param'];
            $query = "DELETE FROM signup_req where ID = '$ID'";
        $query_reader = mysqli_query($dbc,$query);
        }
        
    ?>
    <div class="w3-container">
        <div class="w3-bar w3-white">
            <button class="w3-bar-item w3-button tablink w3-red" onclick="openTab(event,'Accounts')">Accounts</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'create')">Create Account</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Signup')">Signup Requests</button>
        </div>
        <div id="Accounts" class="w3-container w3-border city">
            <h2>Accounts</h2>
            <p><?php 
                $query = 'SELECT * from account_info';
                $r1 = mysqli_query($dbc,$query);
                echo"<table class='table table-striped'>";
                echo "<tr><th>User Name</th><th>Account Number</th><th>Email</th>";
                while($r = mysqli_fetch_array($r1)){
                    echo "<tr><td>$r[accountholdername]</td><td>$r[accountnumber]</td><td>$r[email]</td>";
                }
                echo"</table>"; 
                
                ?></p>
        </div>

       

        <div id="create" class="w3-container w3-border city" style="display:none">
            <h2>Create Account</h2>
            <p>
            <form name = "signup" onsubmit="return validateForm()" method="POST">
                <div class="container">
                <label for="firstname"><b>Firstname</b>
                </label>
                <input type="text" class = "inputblocks" placeholder="Enter Firstname" name="firstname" pattern="[a-zA-Z][a-zA-Z ]{2,}"><br>

                <label for="lastname"><b>Lastname</b></label>
                <input type="text" class = "inputblocks" placeholder="Enter Lastname" name="lastname" pattern="[a-zA-Z][a-zA-Z ]{2,}"><br>

                <label for="dateofbirth"><b>Date of birth</b></label>
                <input type="date" class = "inputblocks" placeholder="Enter Dateofbirth" name="dateofbirth" ><br>

                <label for="sin"><b>Sin</b></label>
                <input type="number" class = "inputblocks" placeholder="Enter your Sin " name="sin"  ><br>

                <label for="phone"><b>Phone</b></label>
                <input type="number" class = "inputblocks" placeholder="xxx-xxx-xxxx" name="phone" ><br>

                <label for="address"><b>Address</b></label>
                <input type="text" class = "inputblocks" placeholder="Enter Address" name="address" ><br>

                <label for="username"><b>Username</b></label>
                <input type="text" class = "inputblocks" placeholder="Enter Username" name="username" ><br>

                <label for="email"><b>Email</b></label>
                <input type="email" class = "inputblocks" placeholder="Enter Email" name="email" ><br>

                <div id="password_div">
                <label for="psw"><b>Password</b></label>
                <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw" ><br>
                </div>

                <div id="pass_confirm_div">
                <label for="psw-repeat"><b>Confirm Password</b></label>
                <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw-repeat" ><br>
                <div id="password_error"></div>
                </div>

                <h4>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</h4><br>

                <button type="submit">Signup</button><br>
                <button type="button"><a href="adminaccount.php">Cancel</a></button>

                </div>


                </form>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                        $fname = mysqli_real_escape_string($dbc,strip_tags($_POST['firstname']));
                        $lname = mysqli_real_escape_string($dbc,strip_tags($_POST['lastname']));
                        $username = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
                        $email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
                        $password = mysqli_real_escape_string($dbc,strip_tags($_POST['psw']));
                        $dob = mysqli_real_escape_string($dbc,strip_tags($_POST['dateofbirth']));
                        $phone = mysqli_real_escape_string($dbc,strip_tags($_POST['phone']));
                        $address = mysqli_real_escape_string($dbc,strip_tags($_POST['address']));
                        $sin = mysqli_real_escape_string($dbc,strip_tags($_POST['sin']));
                        session_start();

                        $lastrowid = $dbc->query('SELECT ID FROM signup_req ORDER BY ID DESC LIMIT 1');
                        while($row = $lastrowid->fetch_assoc()){
                            $lastid = $row['ID'];
                        }
                        $lastid++;
                        $query = "INSERT into signup_req values($lastid,'$username','$password','$email','$phone','$fname','$lname','$dob','$address','$sin')";
                        $query_reader = mysqli_query($dbc,$query);

                        header("Location: http://localhost/bank-of-ontario/adminaccount.php");
                
                    }

                ?>
                <script>
                function validateForm() {
                var Firstname = document.forms["signup"]["firstname"].value;
                if (Firstname == "") {
                    alert("Firstname must be filled out");
                    return false;
                }
                var Lastname = document.forms["signup"]["lastname"].value;
                if (Lastname == "") {
                    alert("Lastname must be filled out");
                    return false;
                }
                var Dateofbirth = document.forms["signup"]["dateofbirth"].value;
                if (Dateofbirth == ""){
                    alert("Dateofbirth must be filled out");
                    return false;
                }
                else{
                var today = new Date();
                var nowyear = today.getFullYear();
                var nowmonth = today.getMonth();
                var nowday = today.getDate();

                var Dateofbirth = new Date(Dateofbirth);

                var birthyear = Dateofbirth.getFullYear();
                var birthmonth = Dateofbirth.getMonth();
                var birthday = Dateofbirth.getDate();

                var age = nowyear - birthyear;

                var age_month = nowmonth - birthmonth;
                var age_day = nowday - birthday;


                if (age > 100) {
                        alert("Age cannot be more than 100 Years.Please enter correct age")
                        return false;
                    }
                    if (age_month < 0 || (age_month == 0 && age_day < 0)) {
                        age = parseInt(age) - 1;

                    }
                    if ((age == 18 && age_month <= 0 && age_day <= 0) || age < 18) {
                        alert("Age should be more than 18 years.Please enter a valid Date of Birth");
                        return false;
                    }
                
                }
            var Sin = document.forms["signup"]["sin"].value;
            if (Sin == "") {
                alert("Sin must be filled out");
                return false;
            }
            else{
                if(!(Sin > 99999999 && Sin < 1000000000) ){
                alert("please check your sin number");
                return false;
                }
            }
            var Phone  = document.forms["signup"]["phone"].value;
            if (Phone  == "") {
                alert("Phone must be filled out");
                return false;
            }
            else{
                if(Phone.length != 10){
                alert("Phone number should be 10 digits");
                return false;
                }
            }
            
            var Username = document.forms["signup"]["username"].value;
            if (Username == "") {
                alert("Username must be filled out");
                return false;
            }

            var Email = document.forms["signup"]["email"].value;
            if (Email == "") {
                alert("Email must be filled out");
                return false;
            }

            var Password = document.forms["signup"]["psw"].value;
            if (Password == "") {
                alert("Password must be filled out");
                return false;
            }
            var Confirm  = document.forms["signup"]["psw-repeat"].value;
            if (Confirm  == "") {
                alert("Confirm Password must be filled out");
                return false;
            }
            if(Password != Confirm){
                alert("Reenter password is not matching with the password");
                return false;
            }
            }
            
    </script>


            </p>
        </div>
        <div id="Signup" class="w3-container w3-border city" style="display:none">
            <h2>Signup Requests</h2>
            <p><?php 
                $query = 'SELECT * from signup_req';
                $r1 = mysqli_query($dbc,$query);
                echo"<table class='table table-striped'>";
                echo "<tr><th>User Name</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email ID</th><th>Date Of Birth</th><th>Address</th><th>SIN</th><th>Accept/Reject</th>";
                while($r = mysqli_fetch_array($r1)){
                    echo "<tr><td>$r[username]</td><td>$r[firstname]</td><td>$r[lastname]</td><td>$r[phone]</td><td>$r[emailid]</td><td>$r[DOB]</td><td>$r[address]</td><td>$r[SIN]</td><td><form method ='post'><input type='submit' name='accept' value='Accept'><input type='hidden' value='$r[ID]' name='param'></form></td><td><form action = 'adminaccount.php' method ='post'><input type='submit' name='reject' value='Reject'><input type='hidden' value='$r[ID]' name='param'></form></td>";
                }
                echo"</table>"; 
                
                ?></p>
        </div>

    </div>


<script>    
function openTab(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}</script>


      </main>
    
    <?php include 'userfooter.php';?>
</body>
</html>