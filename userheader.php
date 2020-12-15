<?php
require('mysqli_connect.php');
echo "
<html>
<head>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>

</head>
<body>
<header>
<a href='index.php'><img src='images/logoB.png' alt='logo' width='50' height='50'/></a>

</header><h1 id='bon'><a href='index.php'>Bank Of Ontario<a></h1>
<nav id='navigation'>
        <ul>
            <li><a href='mainaccount.php' >My Account</a></li>
            <li><a href='about_page.php' >About</a></li>
            <li><a href='Index.php' onclick='test()'>LogOut</a></li>
        </ul>
    </nav>
    </div>
";

echo "<script>
    function test(){".
        session_destroy ()
    ."}
    </script>
    ";      
?>