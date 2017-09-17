<?php 
		include 'auth.php';
		require_once('config.php');
$member_id = $_SESSION['SESS_MEMBER_ID'];
?>		
<!DOCTYPE HTML>
<html>

<head>
  <title>KIMOM Biblioteka</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Biblioteka</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="db.php">Pradinis</a></li>
          <li> <a href="knysa.php">Knygų sąrašas</a> </li>
		  <li> <a href="paieskavar.php">Knygos paieška</a> </li>
		  <li> <a href="uzsakymai.php">Užsakymai</a> </li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       <td width="20%" valign="top" bgcolor="#999f8e">
	   <h2>Labas, <? 
$sql = "SELECT firstname FROM members WHERE member_id = '$member_id' ";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
echo $row['firstname'];

 ?> </h2>
 <a href="logout.php"> (atsijungti) </a>
 </td>
      </div>
      <div id="content">
        <!-- insert the page content here -->
		Čia yra paprasto registruoto vartotojo menu langas
</body>
</html>
