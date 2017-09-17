<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['SESS_login'];
   
   $ses_sql = mysqli_query($db,"select login from members where login = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['login'];
   
   if(!isset($_SESSION['SESS_login'])){
      header("location:login-exec.php");
   }
?>