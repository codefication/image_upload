<?php

  include "dbconnect.php";

  global $con;
  $id = $_POST['id'];
  $qry = "DELETE FROM images WHERE id=$id";
  $result = mysql_query($qry,$con);
  if($result){
    echo "Image deleted.";
  }
  else{
    echo "Image not deleted.";
  }
?>