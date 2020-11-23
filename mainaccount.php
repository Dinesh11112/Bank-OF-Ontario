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
    <h2> Welcome  <?php echo $_SESSION['uname'] ?></h2>
    
    <div class="w3-container">
        <div class="w3-bar w3-white">
            <button class="w3-bar-item w3-button tablink w3-red" onclick="openTab(event,'AccountBalance')">Account Balance</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'PersonalInformation')">Personal Information</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Transactions')">Transactions</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Transfer')">Transfer</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Edit')">Edit Details</button>

        </div>

        <div id="AccountBalance" class="w3-container w3-border city">
            <h2>Account Balance</h2>
            <p> <?php
                $ID = $_SESSION["ID"];
                $query2 = "SELECT * from personal_info where user_authentication_id = '$ID'"; 
                $result2 = $dbc->query($query2);
                if ($result2->num_rows > 0) {
                    echo"<table class='table table-striped'>";
                    while($rs = $result2->fetch_assoc()){
                        echo"<tr><th> Instituition number </th><td> 101</td>";
                        echo"<tr><th> Transit number </th><td> 052</td>";
                        echo "<tr><th>First Name</th><td> $rs[firstname]</td></tr>";
                       
                    }
                    $fetchinfo1 = $dbc->query("select * from account_info where User_Authentication_ID = '$ID'");

                    while($rs = $fetchinfo1->fetch_assoc()){
                        echo "<tr><th>Account Number</th><td> $rs[accountnumber]</td></tr>";
                        echo "<tr><th>Account Balance</th><td> $rs[accountbalance]</td></tr>";
                    }
                    echo"</table>"; 
                    }
                    ?> 
            </p>
        </div>

        <div id="PersonalInformation" class="w3-container w3-border city" style="display:none">
            <h2>Personal Information</h2>
            <?php 
            $ID = $_SESSION["ID"];
                $query = "SELECT * from personal_info where user_authentication_id = '$ID'";
                
                $result = $dbc->query($query);
                if ($result->num_rows > 0) {
                    echo"<table class='table table-striped'>";
                while($r = $result->fetch_assoc()){
                    echo "<tr><th>User Name</th><td> $r[username]</td></tr>";
                    echo "<tr><th>First Name</th><td> $r[firstname]</td></tr>";
                    echo "<tr><th>Last Name</th><td> $r[lastname]</td></tr>";
                    echo "<tr><th>Phone</th><td> $r[phone]</td></tr>";
                    echo "<tr><th>Email ID</th><td> $r[email]</td></tr>";
                    echo "<tr><th>Date Of Birth</th><td> $r[DOB]</td></tr>";
                    echo "<tr><th>Address</th><td> $r[address]</td></tr>";
                    echo "<tr><th>Social Insurance Number</th><td> $r[sinnumber]</td></tr>";
                }
                echo"</table>"; }?> 
        </div>

        <div id="Transactions" class="w3-container w3-border city" style="display:none">
            <h2>Transactions</h2>
            <p></p>
        </div>

<div id="Transfer" class="w3-container w3-border city" style="display:none">
    <h2>Transfer</h2>
    <p>You can Interac amount to your any other account</p>
    <form method="post">
        <div class="container">
            <?php 
            $fetchinfo = $dbc->query("select * from account_info where User_Authentication_ID = '$ID'");
            while($info = $fetchinfo->fetch_assoc()){
                $email = $info['email'];
                $bankbalance = $info['accountbalance'];
                echo '<label for="accountnumber"><b>AccountNumber:</b>&nbsp;&nbsp;'.$info['accountnumber'].'</label><br><br>   
                <label for="accountbalance"><b>AccountBalance:</b>&nbsp;&nbsp;'.$bankbalance.'</label><br><br>';
               
            }

                echo "<label for='email'><b>Send To :</b></label>";

            $result = $dbc->query("select email from personal_info"); 
            echo '<select name="email">';
            while ($row = $result->fetch_assoc()) {
                if($email != $row['email'])
                    echo '<option name="mail" value="'.$row['email'].'">'.$row['email'].'</option>';
            }
            echo '</select>'
            ?><br><br>
            <label for="amount" name="amount"><b>Amount</b></label>
            <input type="number" class = "inputblocks" placeholder="Enter amount to send" name="amount"><br>
            <button type="submit" name="transferform">Send</button><br>
            <button type="button">Cancel</button>
        </div>  
    </form>
            <?php 
                if(isset($_POST['transferform'])){
                    if($_POST['amount'] > $bankbalance){
                        echo "<script>alert('insufficient bank balance')</script>";
                    }
                    else if($_POST['amount'] <= 0){
                        echo "<script>alert('Please enter a valid amount')</script>";
                    }
                    else{
                        $getbankbalance = $dbc->query("select accountbalance from account_info where email = '$_POST[email]'");
                        while($info = $getbankbalance->fetch_assoc()){
                            $balance = $info['accountbalance'] + $_POST['amount'];
                        }
                        $bankbalance-=$_POST['amount'];
                        $query_reader = mysqli_query($dbc,"UPDATE account_info SET accountbalance ='$balance' WHERE email = '$_POST[email]'");
                        $query_reader = mysqli_query($dbc,"UPDATE account_info SET accountbalance ='$bankbalance' WHERE email = '$email'");
                    }
                      //echo "<Script> alert('here : ".$_POST['email']."');</script>";
                }
            ?>



</div>
<div id="Edit" class="w3-container w3-border city" style="display:none">
            <h2>Edit Details</h2>
            <p></p>

            <?php 
            $query = "SELECT * from personal_info where user_authentication_id = '$ID'";
                
            $result = $dbc->query($query);
            if ($result->num_rows > 0) {
                echo"<form method='POST' name='editform' onsubmit='return validate()'><table class='table table-striped'>";
            while($r = $result->fetch_assoc()){
                echo "<tr><th>User Name</th><td><input type='text' value=". $r['username']." name='username'></td></tr>";
                echo "<tr><th>First Name</th><td><input type='text' name='firstname' value=". $r['firstname']."></td></tr>";
                echo "<tr><th>Last Name</th><td><input type='text' name='lastname' value=". $r['lastname']."></td></tr>";
                echo "<tr><th>Phone</th><td> <input type='number' name='phone' value=".$r['phone']."></td></tr>";
                echo "<tr><th>Email ID</th><td><input type='email' name='email' value =".$r['email']."></td></tr>";
                echo "<tr><th>Date Of Birth</th><td><input type='text' name='DOB' value=".$r['DOB']."></td></tr>";
                echo "<tr><th>Address</th><td><input type='text' name='address' value=".$r['address']."></td></tr>";
                echo "<tr><th>Social Insurance Number</th><td><input type='text' name='SIN' value=".$r['sinnumber']."></td></tr>";
            }
            echo "<tr><td><button type='submit' name='submit'>Submit</button></td><td></td></tr>";
            echo"</table></form>"; }

            ?>

            <script>function validate(){
                    var name = document.forms['editform']['username'].value;
                    if(name == ''){
                        alert("Firstname must be filled out");

                        return false;
                    }

            }</script>
            <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
                $fname = $_POST['firstname'];
                $lname =  $_POST['lastname'];
                $username =  $_POST['username'];
                $email =  $_POST['email'];
                $dob =  $_POST['DOB'];
                $phone =  $_POST['phone'];
                $address =  $_POST['address'];
                $sin =  $_POST['SIN'];

                $query_reader = mysqli_query($dbc,"UPDATE personal_info SET firstname='$fname',
                                                                            lastname='$lname',
                                                                            username='$username',
                                                                            email='$email',
                                                                            sinnumber='$sin',
                                                                            DOB='$dob',
                                                                            phone='$phone',address='$address'
                                                                             where User_Authentication_ID = '$ID'");
            header("Refresh:0");    
        }
                //$query = "INSERT into signup_req values($lastid,'$username','$password','$email','$phone','$fname','$lname','$dob','$address','$sin')";
                //$query_reader = mysqli_query($dbc,$query);
                //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
              ?>  
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
}
</script> 

      </main>
    
    <?php include 'userfooter.php';?>
</body>
</html>