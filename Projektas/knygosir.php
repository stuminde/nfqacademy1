<?
		include 'auth.php';
		require_once('config.php');
$member_id = $_SESSION['SESS_MEMBER_ID'];

if(!(empty($_GET["d_id"]))){
			$d_id = $_GET["d_id"];
			//echo $idi;
			$sql = "Delete from Knygos where id = '$d_id'";
            mysqli_query($link, $sql);		
            //echo "Ištrinta!";			
			}

if(!(empty($_GET["del_id"]))){
			$idi = $_GET["del_id"];
			//echo $idi;
			$sql = "DELETE from Knygos where member_id = '$idi'";
            mysqli_query($link, $sql);
            $sql = "Delete from members where member_id = '$idi'";
            mysqli_query($link, $sql);			
			}
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
          <li><a href="vartotojusa.php">Vartotojų sąrašas</a></li>
		  <li class="selected"> <a href="knygosir.php">Knygos įrašymas</a> </li>
		  <li> <a href="paieska.php">Knygos paieška</a> </li>
		  <li> <a href="knygusa.php">Knygų sąrašas</a> </li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       <td width="20%" valign="top" bgcolor="#999f8e">
</td>
<h1>Sveikas, <? 
$sql = "SELECT firstname FROM members WHERE member_id = '$member_id' ";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
echo $row['firstname'];

 ?> </h1>
 <p><a href="logout.php"> (atsijungti) </a></p>
      </div>
      <div id="content">
        <!-- insert the page content here -->
Čia vykdomas knygos įrašymas. Kad įrašyti knygą į duomenų bazę būtina užpildyti visus tris laukus
		<form id="loginForm" name="loginForm" method="post" action="knygosir.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <th>Pavadinimas </th> 
      <td><input name="Pavadinimas" type="text" class="textfield" id="fname" />
 </td>
    </tr>
    <tr>
      <th>Autorius</th>
      <td><input name="Autorius" type="text" class="textfield" id="lname" /></td>
    </tr>
    <tr>
      <th width="124">Išleidimo metai</th>
      <td width="168"><input name="Metai" type="text" class="textfield" id="login" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Įrašyti" /></td>
    </tr>
  </table>
  </form>
  <?				if(!(empty($_GET["del_id"]))){
			$idi = $_GET["del_id"];
			//echo $idi;
			$sql = "Delete from Knygos where id = '$idi'";
            mysqli_query($link, $sql);			
			}

if (isset($_POST['submit'])) { 
   $Pavadinimas = $_POST["Pavadinimas"];
   $Autorius = $_POST["Autorius"];
   $Metai = $_POST["Metai"];
  
    if (empty($Pavadinimas))  {
	  echo 'Neįvedėte pavadinimo</br>';  
	} 
	
	if (empty($Autorius))  {
	  echo 'Neįvedėte autoriaus</br>'; 
	}
	
	if (empty($Metai))  {
	  echo 'Neįvedėte leidimo metų'; 
	}
	
	else if ((!(empty($_POST["Pavadinimas"]))) && (!(empty($_POST["Autorius"]))) && (!(empty($_POST["Autorius"])))) {
    $sql = "INSERT INTO Knygos (Pavadinimas, Autorius, Metai, member_id) Values ('$Pavadinimas', '$Autorius', '$Metai', '$member_id')";
	mysqli_query($link, $sql);
    echo 'Duomenys įvesti';
   }
}
?>
</tr>

<tr>
</tr>
</table>
 
</body>
</html>