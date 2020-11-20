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
  width: 100%;
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
        <h2>Admin login</h2>
        <form name = "adminlogin" onsubmit="return validateForm()" method="post">
    <div class="container">
    <label for="uname"><b>AdminName</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Username" name="uname" >

    <label for="psw"><b>Password</b></label>
    <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw" >

    <button type="submit">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="index.php">Cancel</a></button>
  </div>
</form>
<?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $_SESSION["uname"] = $_POST['uname'];
        $statement = mysqli_prepare($dbc, "Select * from admin_authentication WHERE username = ? and password=?");
            mysqli_stmt_bind_param($statement, 'ss', $_SESSION["uname"], $_POST['psw']);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            if(mysqli_stmt_num_rows($statement)==1){   
              $q = "select * from admin_authentication" ;
              $result = $dbc->query($q);
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $_SESSION["ID"] = $r1['AdminID'];
                  }
                  header("Location:adminaccount.php");
              } else {
                  echo "Wrong Credentials";
              }
              }
        }
    ?>

    </main>
    
    <?php include 'footer.php';?>

    <script>
      function validateForm() {
  var x = document.forms["adminlogin"]["uname"].value;
  if (x == "") {
    alert("AdminName must be filled out");
    return false;
  }
  var y = document.forms["adminlogin"]["psw"].value;
  if (y == "") {
    alert("Password must be filled out");
    return false;
  }
}
    </script>
</body>
</html>