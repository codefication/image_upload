<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "kstark";
  // Create connection
  $con = mysql_connect($servername, $username, $password) or die ('Error connecting to mysql');

  //connect to db
  mysql_select_db($dbname,$con);

  // Check connection
  if (!$con) {
    die("Connection failed: " . mysql_error());
  }
?>