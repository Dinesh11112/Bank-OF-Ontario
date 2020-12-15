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
        <div id="content">
        <form action="login.php" name = "signin" onsubmit="return validateForm()" method="post">
              <div class="container">
                <img class="log" src="Images/login.png"/>
                <div class="content" id="login">
                <h3>User Login</h3>
                <input type="text" class = "inputblocks" placeholder="Enter Username" name="uname" ><br>
                <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw" ><br>
                <div class="btn">
                  <button type="submit">Login</button><br><br>
                  <button type="button">Cancel</button>
                </div>
               </div>
              </div>
            </form>
          </div>
    <?php
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $_SESSION["uname"] = $_POST['uname'];
        $statement = mysqli_prepare($dbc, "Select * from user_authentication WHERE username = ? and password=?");
            mysqli_stmt_bind_param($statement, 'ss', $_SESSION["uname"], $_POST['psw']);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            if(mysqli_stmt_num_rows($statement)==1){   
              $ID = $_SESSION['uname'];
              $q = "select * from user_authentication where username = '$ID'";
              $result = $dbc->query($q);
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $_SESSION["ID"] = $row["ID"];
                  }
                  header("Location:mainaccount.php");

              }} else {
                  echo "<script>alert('Wrong Credentials Please try again');</script>";
              }
              }
    ?>
  </form>
    </div>
</main>
   

    <script>

  function validateForm() {
  var x = document.forms["signin"]["uname"].value;
  if (x == "") {
    alert("UserName must be filled out");
    return false;
  }
  var y = document.forms["signin"]["psw"].value;
  if (y == "") {
    alert("Password must be filled out");
    return false;
  }
}

    </script>
</body>
</html>