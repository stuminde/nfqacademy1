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
          <li> <a href="vartotojusa.php">Vartotojų sąrašas</a> </li>
		  <li> <a href="knygosir.php">Knygos įrašymas</a> </li>
		  <li class="selected"> <a href="paieska.php">Knygos paieška</a> </li>
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
 <?php			
//apsirašome input kintamąjį, paimame reikšmę iš paieska.php
$input = $_POST['find']; 

//Jeigu nieko nebuvo įvesta, išmetame pranešimą

if ($input == "")
{
echo "<p><h3>Jūs pamiršome įvesti tekstą į paieškos lauką!</h3>";
exit;
}

$input = strip_tags( $input );
$input = mysqli_real_escape_string($link, $input);
$input = trim( $input );

//sql užklausa
$sql = "SELECT * FROM Knygos WHERE Pavadinimas LIKE '%$input%' OR Autorius LIKE '%$input%' OR Metai LIKE '%$input%'";

//paleidžiama užklausa 
$Metai = mysqli_query($link, $sql) or die(mysql_error());
  echo "<table border='2'>
<tr>
<th>Pavadinimas</th>
<th>Autorius</th>
<th>Leidimo metai</th>
</tr>";
while ($result = mysqli_fetch_array($Metai)) {

$title = $result['Pavadinimas'];
$date = $result['Metai'];
$info = $result['Autorius'];
// duomenų išvedimas i ekrana 
echo "<tr>";
echo "<td>" . $title . "</td>";
echo "<td>" . $info . "</td>";
echo "<td>" . $date . "</td>";
echo "</tr>";
}
$anymatches=mysqli_num_rows($Metai);
if ($anymatches == 0)
{
echo "<h3>Rezultatai</h3>";
echo "<p>Atitikmenų: &quot;" . $input . "&quot; nerasta</p>";
}

//Ko ieškojome
echo "<br><b>Ieškojote:</b> " .$input
?>
</body>
</html>
