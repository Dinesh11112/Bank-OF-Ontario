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
    <h2> Welcome to Your Page Dear <?php echo $_SESSION['uname'] ?></h2>
    
    <div class="w3-container">
        <div class="w3-bar w3-white">
            <button class="w3-bar-item w3-button tablink w3-red" onclick="openTab(event,'AccountBalance')">Account Balance</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'PersonalInformation')">Personal Information</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Transactions')">Transactions</button>
            <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Transfer')">Transfer</button>
        </div>
        <div id="AccountBalance" class="w3-container w3-border city">
            <h2>AccountBalance</h2>
            <?php echo "id : ".$_SESSION['ID']; ?>
            <p></p>
        </div>

        <div id="PersonalInformation" class="w3-container w3-border city" style="display:none">
            <h2>Personal Information</h2>
            <p><?php 
            $ID = $_SESSION["ID"];
                $query = "SELECT * from personal_info where user_authentication_id = '$ID'";
                
                $result = $dbc->query($query);
                if ($result->num_rows > 0) {
                echo"<table>";
                while($r = $result->fetch_assoc()){
                    echo "<tr><th>User Name</th><td> $r[username]</td></tr>";
                    echo "<tr><th>First Name</th><td> $r[firstname]</td></tr>";
                    echo "<tr><th>Last Name</th><td> $r[lastname]</td></tr>";
                    echo "<tr><th>Phone</th><td> $r[phone]</td></tr>";
                    echo "<tr><th>Email ID</th><td> $r[email]</td></tr>";
                    echo "<tr><th>Date Of Birth</th><td> $r[DOB]</td></tr>";
                    echo "<tr><th>Address</th><td> $r[address]</td></tr>";
                    echo "<tr><th>Social Insurance Number</th><td> $r[SIN]</td></tr>";
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
            echo '<label for="accountnumber"><b>AccountNumber:</b>&nbsp;&nbsp;'.$info['accountnumber'].'</label><br><br>   
            <label for="accountbalance"><b>AccountBalance:</b>&nbsp;&nbsp;'.$info['accountbalance'].'</label><br><br>';}?>
            <label for="email"><b>Send To :</b></label>
            <?php 
            $result = $dbc->query("select email from personal_info"); 
            echo '<select name="email">';
            while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['email'].'">'.$row['email'].'</option>';
            }
            echo '</select>'
            ?><br><br>
            <label for="amount"><b>Amount</b></label>
            <input type="number" class = "inputblocks" placeholder="Enter amount to send" name="amount"><br>
            <button type="submit">Send</button><br>
            <button type="button">Cancel</button>
        </div>  
    </form>




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