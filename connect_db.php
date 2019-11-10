<?php


    $host="localhost";
    $userDB="root";
    $passwdDB="1111";
    //$userDB="root";    
    //집$passwdDB="123456";
    
    $conn=mysqli_connect($host,$userDB,$passwdDB) or die("mysql 실패");
    mysqli_select_db($conn,'norun');
    mysqli_set_charset($conn, 'utf8');
  
?>