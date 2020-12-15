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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
    $('.speaker').click(function(){
            speechSynthesis.cancel()    ;
      var text_to_read = $(this).prev().text();
        var u = new SpeechSynthesisUtterance(text_to_read);
   speechSynthesis.speak(u); if(!/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
     u.rate = .2;
    }
    u.text = text_to_read.textContent;

    });

});
</script>
</head>
<body >
    <?php include 'header.php';?>

    <main id="signupbody">
        
        <form name = "signup" onsubmit="return validateForm()" method="POST">
    <div class="main-container">
      <div class="container2">
        <h1 class="whitetext">HELLO!</h1>
        <p class="whitetext">Enter your details and start journey with us</p>
     </div>
    <div class="container1" id="formback">
      <p>Create Account</p>
    <label for="firstname"><b>Firstname</b>&nbsp;<img src="images/speak.png" class="speaker">
</label>
    <input type="text" class = "inputblocks1" placeholder="Enter Firstname" name="firstname" pattern="[a-zA-Z][a-zA-Z ]{2,}"><br>

    <label for="lastname"><b>Lastname</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="text" class = "inputblocks1" placeholder="Enter Lastname" name="lastname" pattern="[a-zA-Z][a-zA-Z ]{2,}"><br>

    <label for="dateofbirth"><b>Date of birth</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="date" class = "inputblocks1" placeholder="Enter Dateofbirth" name="dateofbirth" ><br>

    <label for="sin"><b>Sin</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="number" class = "inputblocks1" placeholder="Enter your Sin " name="sin"  ><br>

    <label for="phone"><b>Phone</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="number" class = "inputblocks1" placeholder="xxx-xxx-xxxx" name="phone" ><br>

    <label for="address"><b>Address</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="text" class = "inputblocks1" placeholder="Enter Address" name="address" ><br>

    <label for="username"><b>Username</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="text" class = "inputblocks1" placeholder="Enter Username" name="username" ><br>

    <label for="email"><b>Email</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="email" class = "inputblocks1" placeholder="Enter Email" name="email" ><br>

    <div id="password_div">
    <label for="psw"><b>Password</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="password" class = "inputblocks1" placeholder="Enter Password" name="psw" ><br>
    </div>

    <div id="pass_confirm_div">
    <label for="psw-repeat"><b>Confirm Password</b>&nbsp;<img src="images/speak.png" class="speaker"></label>
    <input type="password" class = "inputblocks1" placeholder="Enter Password" name="psw-repeat" ><br>
    <div id="password_error"></div>
    </div>

    <h4>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</h4><br>

    <button class="btn1" type="submit">Signup</button><br>
    <button  class="btn1" type="button"><a href="index.php">Cancel</a></button>
    
  </div>
</div><center>
<div id="invertion">
<input type="button" onclick="convertfunctions()" id = "invert" value="Dark Mode">
<input type="button" onclick="revertfunction()" id = "revert" style="display:none" value ="Light Mode"><br>
</center></div>
  
</form>

    </main>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
        $fname = mysqli_real_escape_string($dbc,strip_tags($_POST['firstname']));
        $lname = mysqli_real_escape_string($dbc,strip_tags($_POST['lastname']));
        $username = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
        $email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
        $password = mysqli_real_escape_string($dbc,strip_tags($_POST['psw']));
        $dob = mysqli_real_escape_string($dbc,strip_tags($_POST['dateofbirth']));
        $phone = mysqli_real_escape_string($dbc,strip_tags($_POST['phone']));
        $address = mysqli_real_escape_string($dbc,strip_tags($_POST['address']));
        $sin = mysqli_real_escape_string($dbc,strip_tags($_POST['sin']));
       // require('mysqli_connect.php');

          $lastrowid = $dbc->query('SELECT ID FROM signup_req ORDER BY ID DESC LIMIT 1');
          while($row = $lastrowid->fetch_assoc()){
            $lastid = $row['ID'];
          }
          $lastid++;
        $query = "INSERT into signup_req values($lastid,'$username','$password','$email','$phone','$fname','$lname','$dob','$address','$sin')";
        $query_reader = mysqli_query($dbc,$query);
          echo "<script>alert('account created successfully please wait till the admin approves your account')";
        header("Location: http://localhost/bank-of-ontario/index.php");
 
    }

?>
    

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
      if (Dateofbirth == ""){
        alert("Dateofbirth must be filled out");
        return false;
      }
    else{
      var today = new Date();
      var nowyear = today.getFullYear();
      var nowmonth = today.getMonth();
      var nowday = today.getDate();

      var Dateofbirth = new Date(Dateofbirth);

      var birthyear = Dateofbirth.getFullYear();
      var birthmonth = Dateofbirth.getMonth();
      var birthday = Dateofbirth.getDate();

      var age = nowyear - birthyear;

      var age_month = nowmonth - birthmonth;
      var age_day = nowday - birthday;


      if (age > 100) {
            alert("Age cannot be more than 100 Years.Please enter correct age")
            return false;
        }
        if (age_month < 0 || (age_month == 0 && age_day < 0)) {
            age = parseInt(age) - 1;

        }
        if ((age == 18 && age_month <= 0 && age_day <= 0) || age < 18) {
            alert("Age should be more than 18 years.Please enter a valid Date of Birth");
            return false;
        }
      
    }
  var Sin = document.forms["signup"]["sin"].value;
  if (Sin == "") {
    alert("Sin must be filled out");
    return false;
  }
  else{
    if(!(Sin > 99999999 && Sin < 1000000000) ){
      alert("please check your sin number");
      return false;
    }
  }
  var Phone  = document.forms["signup"]["phone"].value;
  if (Phone  == "") {
    alert("Phone must be filled out");
    return false;
  }
  else{
    if(Phone.length != 10){
      alert("Phone number should be 10 digits");
      return false;
    }
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
  if(Password != Confirm){
    alert("Reenter password is not matching with the password");
    return false;
  }
}
 
function convertfunctions(){
  document.getElementById("signupbody").style.backgroundColor = "black";
  document.getElementById("formback").style.backgroundColor = "black";
  document.getElementById("formback").style.color = "white";
  var elements = document.getElementsByClassName('whitetext'); // get all elements
	for(var i = 0; i < elements.length; i++){
		elements[i].style.color = "white";
  }
  document.getElementById("revert").style.display="inline";
  document.getElementById("invert").style.display="none";  
}

function revertfunction(){
  document.getElementById("revert").style.display="none";
  document.getElementById("invert").style.display="inline"; 
  document.getElementById("signupbody").style.backgroundColor = "white";
  document.getElementById("formback").style.backgroundColor = "white";
  document.getElementById("formback").style.color = "black";
  var elements = document.getElementsByClassName('whitetext'); // get all elements
	for(var i = 0; i < elements.length; i++){
		elements[i].style.color = "black";
}
}

    </script>
</body>
</html>