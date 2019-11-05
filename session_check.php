<?php

if(!isset($_SESSION['userid'])){
session_start();      

 $userid=$_SESSION['userid'];

session_abort();
}


?>