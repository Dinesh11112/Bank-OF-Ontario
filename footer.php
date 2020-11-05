<?php
echo "<script
src='https://code.jquery.com/jquery-3.5.1.min.js'
integrity='sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0='
crossorigin='anonymous'></script>";
echo"
<footer>
<form method='post'>
<p>Subscribe to get latest updates and weekly newsletter</p>
<input id='mail' type='text' placeholder='EMAIL ADDRESS' name='mail' required>&nbsp;&nbsp;
<input id='subscribe' type='submit' value='SUBSCRIBE'></form>
<section class='bottom'>
  <h2>Bank Of Ontario</h2>
  <p>At BFO, we are in business to help our clients, employees and shareholders achieve what is important to them.<br><br> Our ability to create value for all BFO stakeholders is driven by a business culture based on common values:<br><br> Trust<br> Teamwork<br> Accountability<br><br>
    All you have to do is sign-up and start exploring!</p><br><br>
  <a href='contact.php'>Contact Us</a>
  <a href='faq.php'>FAQ</a>&nbsp;&nbsp;
  <a href='terms.php'>Terms&Conditions</a>&nbsp;&nbsp;
  <a href='privacy.php'>Privacy Policy</a>&nbsp;&nbsp;
</section>
</footer>
";
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $mailid = $_POST['mail'];

  echo "<script>alert('hellooo $mailid');</script>";
}*/
?>