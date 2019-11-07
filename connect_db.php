<?php


    $host="localhost";
    $userDB="root";
   // $passwdDB="1111";
    //$userDB="root";    
    $passwdDB="123456";
    
    $conn=mysqli_connect($host,$userDB,$passwdDB) or die("mysql 실패");
    $db=mysqli_select_db($conn,'norun');
    
  
?>