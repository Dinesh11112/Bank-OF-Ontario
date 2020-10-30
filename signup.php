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
<style>
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
.inputblocks {
  width: 40%; 
  padding:12px 20px;
  margin: 8px 8px;
  display: block;
  border: 2px solid #ccc;
  box-sizing: border-box;
  text-align:center;
  

  
  
}

/* Set a style for all buttons */
button {
  background-color: skyblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color:blue;
}



/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}*/
</style>
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