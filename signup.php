<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Welcome to Bank Of Ontario, a global bank in Canada & the Americas. Get bank accounts, loans, mortgages, & more."/>
    <meta name="keywords" content="Bank, Finance, Loans, Credit"/>
    <link rel="shortcut icon" href="images/logoB.png"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/signup.css"/>
    <title>Bank Of Ontario</title>
</head>
<body>
    <?php include 'header.php';?>
    <main>
    <?php include 'headerimage.php';?>
        <div id="content">
        <center>
        <form action="action_page.php" method="post">
    <div class="container">

    <label for="firstname"><b>Firstname</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Firstname" name="firstname" required><br>

    <label for="lastname"><b>Lastname</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Lastname" name="lastname" required><br>

    <label for="dateofbirth"><b>Dateofbirth</b></label>
    <input type="date" class = "inputblocks" placeholder="Enter Dateofbirth" name="dateofbirth" required><br>

    <label for="sin"><b>Sin</b></label>
    <input type="number" class = "inputblocks" placeholder="Enter your Sin " name="sin" required><br>

    <label for="phone"><b>Phone</b></label>
    <input type="tel" class = "inputblocks" placeholder="Enter Phone" name="phone" required><br>

    <label for="address"><b>Address</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Address" name="address" required><br>

    <label for="username"><b>Username</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Username" name="username" required><br>

    <label for="email"><b>Email</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Email" name="email" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw" required><br>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw-repeat" required><br>

    <h4>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</h4><br>

    <button type="submit">Signup</button><br>
    <button type="button">Cancel</button>
    
  </div>

  
</form>
</center>
    </main>
    
    <?php include 'footer.php';?>
</body>
</html>