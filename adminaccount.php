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
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'PersonalInformation')">Personal Information</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Transactions')">Transactions</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Signup')">Signup Requests</button>
        </div>
        <div id="Accounts" class="w3-container w3-border city">
            <h2>Accounts</h2>
            <p><?php 
                $query = 'SELECT * from account_info';
                $r1 = mysqli_query($dbc,$query);
                echo"<table class='table table-striped'>";
                echo "<tr><th>User Name</th><th>Account Number</th><th>Email</th><th>online/freeze</th>";
                while($r = mysqli_fetch_array($r1)){
                    echo "<tr><td>$r[accountholdername]</td><td>$r[accountnumber]</td><td>$r[email]</td><td><form method ='post'><input type='submit' name='accept' value='Freeze'><input type='hidden' name='unfreeze' value='unfreeze'><input type='hidden' value='$r[User_Authentication_ID]' name='param'></form></td>";
                }
                echo"</table>"; 
                
                ?></p>
        </div>

        <div id="PersonalInformation" class="w3-container w3-border city" style="display:none">
            <h2>Personal Information</h2>
            <p><?php 
                $query = 'SELECT * from personal_info where user_authentication_id = 1';
                $r1 = mysqli_query($dbc,$query);
                echo"<table>";
                while($r = mysqli_fetch_array($r1)){
                    echo "<tr><th>User Name</th><td> $r[username]</td></tr>";
                    echo "<tr><th>First Name</th><td> $r[firstname]</td></tr>";
                    echo "<tr><th>Last Name</th><td> $r[lastname]</td></tr>";
                    echo "<tr><th>Phone</th><td> $r[phone]</td></tr>";
                    echo "<tr><th>Email ID</th><td> $r[email]</td></tr>";
                    echo "<tr><th>Date Of Birth</th><td> $r[DOB]</td></tr>";
                    echo "<tr><th>Address</th><td> $r[address]</td></tr>";
                    echo "<tr><th>Social Insurance Number</th><td> $r[SIN]</td></tr>";
                }
                echo"</table>"; ?></p> 
        </div>

        <div id="Transactions" class="w3-container w3-border city" style="display:none">
            <h2>Transactions</h2>
            <p></p>
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