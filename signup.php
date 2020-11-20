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
        <form action="#" name = "signup" onsubmit="return validateForm()" method="post">
    <div class="container">
    <label for="firstname"><b>Firstname</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Firstname" name="firstname" ><br>

    <label for="lastname"><b>Lastname</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Lastname" name="lastname" ><br>

    <label for="dateofbirth"><b>Dateofbirth</b></label>
    <input type="date" class = "inputblocks" placeholder="Enter Dateofbirth" name="dateofbirth" ><br>

    <label for="sin"><b>Sin</b></label>
    <input type="number" class = "inputblocks" placeholder="Enter your Sin " name="sin" ><br>

    <label for="phone"><b>Phone</b></label>
    <input type="tel" class = "inputblocks" placeholder="xxx-xxx-xxxx" name="phone" pattern = "[0-9] {3} - [0-9] {3} - [0-9] {4}" ><br>

    <label for="address"><b>Address</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Address" name="address" ><br>

    <label for="username"><b>Username</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Username" name="username" ><br>

    <label for="email"><b>Email</b></label>
    <input type="text" class = "inputblocks" placeholder="Enter Email" name="email" ><br>

    <div id="password_div">
    <label for="psw"><b>Password</b></label>
    <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw" ><br>
    </div>

    <div id="pass_confirm_div">
    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" class = "inputblocks" placeholder="Enter Password" name="psw-repeat" ><br>
    <div id="password_error"></div>
    </div>

    <h4>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</h4><br>

    <button type="submit">Signup</button><br>
    <button type="button"><a href="index.php">Cancel</a></button>
    
  </div>

  
</form>
</center>
    </main>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
        $fname = mysqli_real_escape_string($dbc,strip_tags($_POST['firstname']));
        $lname = mysqli_real_escape_string($dbc,strip_tags($_POST['lastname']));
        $username = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
        $email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
        /* if(($_SERVER['REQUEST_METHOD']=="POST")){

        $pattern = "^[a-zA-Z0-9_]*@[a-zA-Z]*.[a-zA-Z]{2,4}";
        $mail = $_POST['mail'];

        if(empty($mail) ){
            echo "Please enter valid email.";
        } elseif (!preg_match($pattern,$mail)){
            echo "Please enter valid email.";
        } else {
            echo "You entered valid email.";
        }
    }*/
        $password = mysqli_real_escape_string($dbc,strip_tags($_POST['psw']));
        $dob = mysqli_real_escape_string($dbc,strip_tags($_POST['dateofbirth']));
        $phone = mysqli_real_escape_string($dbc,strip_tags($_POST['phone']));
        $address = mysqli_real_escape_string($dbc,strip_tags($_POST['address']));
        $sin = mysqli_real_escape_string($dbc,strip_tags($_POST['sin']));
       // require('mysqli_connect.php');
        session_start();

        $result = $dbc->query('select * from signup_req');
        $rowcount = $result->num_rows;
        $rowcount++;
        $query = "INSERT into signup_req values($rowcount,'$username','$password','$email','$phone','$fname','$lname','$dob','$address','$sin')";
        $query_reader = mysqli_query($dbc,$query);
        header("Location: http://localhost/bank-of-ontario/index.php");
 
    }

?>
    <?php include 'footer.php';?>

    <script>
    function validateForm() {
  var Firstname = document.forms["signup"]["firstname"].value;
  if (Firstname == "") {
    alert("Firstname must be filled out");
    return false;
  }
  var Lastname = document.forms["signup"]["lastname"].value;
  if (Lastname == "") {
    alert("Lastname must be filled out");
    return false;
  }
  var Dateofbirth = document.forms["signup"]["dateofbirth"].value;
  if (Dateofbirth == "") {
    alert("Dateofbirth must be filled out");
    return false;
  }
  var Sin = document.forms["signup"]["sin"].value;
  if (Sin == "") {
    alert("Sin must be filled out");
    return false;
  }
  var Phone  = document.forms["signup"]["phone"].value;
  if (Phone  == "") {
    alert("Phone must be filled out");
    return false;
  }
  var Address = document.forms["signup"]["address"].value;
  if (Address == "") {
    alert("Address must be filled out");
    return false;
  }
  var Username = document.forms["signup"]["username"].value;
  if (Username == "") {
    alert("Username must be filled out");
    return false;
  }
  var Email = document.forms["signup"]["email"].value;
  if (Email == "") {
    alert("Email must be filled out");
    return false;
  }
  var Password = document.forms["signup"]["psw"].value;
  if (Password == "") {
    alert("Password must be filled out");
    return false;
  }
  var Confirm  = document.forms["signup"]["psw-repeat"].value;
  if (Confirm  == "") {
    alert("Confirm Password must be filled out");
    return false;
  }
}
 
    </script>
</body>
</html>