<?
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
          <li><a href="db.php">Pradinis</a></li>
		  <li class="selected"> <a href="knysa.php">Knygų sąrašas</a> </li>
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
<?
if(!(empty($_GET["id"]))){
			$id = $_GET["id"];
			//echo $idi;
			$sql = "INSERT INTO Uzsakymai (Knygos_id, member_id) Values ('$id', '$member_id')";
            mysqli_query($link, $sql);		
            echo "</br>Knyga užsakyta!";			
			}
	
	
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
	$startrow = 0;
	} 
	else {
	$startrow = (int)$_GET['startrow'];
	}
	$prev = $startrow - 15;
$sql = "SELECT * FROM Knygos ORDER BY Pavadinimas DESC LIMIT $startrow, 15 ";
$Metai = mysqli_query($link, $sql) or die(mysqli_error());
echo "<table>
<tr>
<th>Pavadinimas</th>
<th>Autorius</th>
<th>Leidimo metai</th>
</tr>";
while ($result = mysqli_fetch_array($Metai)) {
$title = $result['Pavadinimas'];
$date = $result['Metai'];
$info = $result['Autorius'];
$id = $result['id'];
// duomenų išvedimas i ekrana 
echo "<tr>";
echo "<td>" . $title . "</td>";
echo "<td>" . $info . "</td>";
echo "<td>" . $date . "</td>";
echo "<td><a href=\"knysa.php?id=$id\"> [užsakyti] </a></td>";
  echo "</tr>";
  }
echo "</table>";
//Spausdina Atgal tik jei jau buvo paspaustas Toliau;
if ($prev >= 0)
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">Atgal</a></br>';
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+15).'">Toliau</a>';
?>
</body>
</html>
