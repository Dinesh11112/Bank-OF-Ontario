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
    <?php include 'header.php';?>
    <main>
    <?php include 'headerimage.php';?>
        <div id="content">
        <center>
        <form action="transaction.php" method="post">
    <div class="container">

    <label for="accountnumber"><b>AccountNumber:</b>&nbsp;&nbsp;21398547892</label><br><br>
    
    
    <label for="accountbalance"><b>AccountBalance:</b>&nbsp;&nbsp;21000</label><br><br>
    

    <label for="email"><b>Email</b></label>
    <input type="email" class = "inputblocks" placeholder="Enter Email id of the recipient" name="email" required><br>

    <label for="amount"><b>Amount</b></label>
    <input type="number" class = "inputblocks" placeholder="Enter amount to send" name="amount" required><br>

    <button type="submit">Send</button><br>
    <button type="button">Cancel</button>
    
  </div>

  
</form>
</center>
    </main>
    
    <?php include 'footer.php';?>
</body>
</html>