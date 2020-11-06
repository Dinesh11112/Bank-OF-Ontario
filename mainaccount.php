<?php
session_start();




//echo "logged in succesfully" . $_SESSION['uname'];
//echo "ID". $_SESSION['ID'];
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
    <title>Bank Of Ontario</title>
</head>
<body>
    <?php include 'userheader.php';?>
    <main>
    <?php include 'headerimage.php';?>
    <h2> Welcome to Your Page Dear <?php echo $_SESSION['uname'] ?></h2>

      </main>
    
    <?php include 'userfooter.php';?>
</body>
</html>