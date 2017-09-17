<?
		include 'auth.php';
		require_once('config.php');
$member_id = $_SESSION['SESS_MEMBER_ID'];

if(!(empty($_GET["m_id"]))){
			$d_id = $_GET["m_id"];
			//echo $idi;
			$sql = "Delete from uzsakymai where id = '$m_id'";
            mysqli_query($link, $sql);		
            //echo "Ištrinta!";			
			}

if(!(empty($_GET["del_id"]))){
			$idi = $_GET["del_id"];
			//echo $idi;
			$sql = "DELETE from uzsakymai where member_id = '$m_id'";
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
          <li class="selected"> <a href="vartotojusa.php">Vartotojų sąrašas</a> </li>
		  <li> <a href="knygosir.php">Knygos įrašymas</a> </li>
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
<tr valign="top">
<td style="background-color:#EFEEEE;width:300px;text-align:top;">
 <?echo '<b>Narių sąrašas:</b> <br />';
 $sql = "SELECT login, member_id FROM members WHERE member_id <> 1";
 $result=mysqli_query($link, $sql);
	while( $row=mysqli_fetch_array($result) )
	{
          $login = $row['login'];
		  $m_id = $row['member_id'];
             echo "<a href=\"vartotojusa.php?m_id=$m_id\"> $login </a>";
			 echo "<a href=\"vartotojusa.php?del_id=$m_id\"> [ištrinti] </a><br />";
	}
 
 ?>
<?       
if(!(empty($_GET["m_id"]))){
			$m_id = $_GET["m_id"];
			
			
       $sql = "Select * from members WHERE member_id = '$m_id'";
				 
        $result=mysqli_query($link, $sql);
		echo "Nario informacija:";
		echo '<table border="1">';
             echo '<tr>';
			 echo '<th>Vardas</th>';
             echo '<th>Pavardė</th>';
             echo '<th>Pris. Vardas</th>';
             echo '</tr>';
	while($row=mysqli_fetch_array($result))
	{
	           //print_r ($row);
			   
	         //$id = $row['id'];
             //echo $id; 
             echo '<tr>';
			 echo '<td>';
			 echo $row['firstname'];
			 echo '</td>';
			 echo '<td>';
			 echo $row['lastname'];
			 echo '</td>';
			 echo '<td>';
			 echo $row['login'];
			 echo '</td>';
			 echo '</tr>';  
			// echo '<br />';
	}
	echo '</table>';
   
	//////////////////////////////////////////////////
	$sql = "SELECT * FROM Knygos INNER JOIN Uzsakymai ON Knygos.id = Uzsakymai.Knygos_id Where Uzsakymai.member_id =$m_id";
				 
        $result=mysqli_query($link, $sql);
		echo '<br />';
		echo "Nario užsakytų knygų sąrašas:";
		echo '<table border="1">';
             echo '<tr>';
			 echo '<th>Pavadinimas</th>';
             echo '<th>Autorius</th>';
             echo '</tr>';
	while($row=mysqli_fetch_array($result))
	{
	           //print_r ($row);
			   
	         $id = $row['id'];
             //echo $id; 
             echo '<tr>';
			 echo '<td>';
			 echo $row['Pavadinimas'];
			 echo '</td>';
			 echo '<td>';
			 echo $row['Autorius'];
			 echo '</td>';
			 echo '</tr>';  
			// echo '<br />';
	}
	echo '</table>';
	
 }
 
?></td>
</tr>

<tr>
</tr>
</table>		
</tr>

<tr>
</tr>
</table>
 
</body>
</html>