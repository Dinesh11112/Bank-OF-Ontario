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
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: skyblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
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

r

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
        <form action="login.php" method="post">
    <div class="container">
    <label for="uname"><b>Username :</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Username" name="uname" required>
<br>
    <label for="psw"><b>Password :</b></label>
    <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $_SESSION["uname"] = $_POST['uname'];
        $statement = mysqli_prepare($dbc, "Select * from user_authentication WHERE username = ? and password=?");
            mysqli_stmt_bind_param($statement, 'ss', $_SESSION["uname"], $_POST['psw']);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            if(mysqli_stmt_num_rows($statement)==1){   
                $q = "select ID from user_authentication where username=$_SESSION[uname]" ;
                $r = @mysqli_query($dbc, $q);
                  if (mysqli_affected_rows($dbc) != 0) { 
                    while($r1 = mysqli_fetch_array($r,mysqli_assoc)){
                      echo "<script>alert('here');</script>";
                        $_SESSION["ID"] = $r1['ID'];
                    }
                  }  
                   header("Location:mainaccount.php");
            }
            else{
                echo "<h3>Wrong Credentials! Please try again!</h3>";
            }
      }
    ?>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
</form>
    </main>
    
    <?php include 'footer.php';?>
</body>
</html>