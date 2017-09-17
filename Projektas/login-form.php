<!DOCTYPE HTML>
<html>

<head>
  <title>KIMOM biblioteka</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
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
          <li class="selected"><a href="index.php">Pradinis</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       <td width="20%" valign="top" bgcolor="#999f8e">
<form id="loginForm" name="loginForm" method="post" action="login-exec.php">
  <table width="200" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td><b>Vardas</b></td>
      <td><input name="login" type="text" class="textfield" id="login" size="10"/></td>
    </tr>
    <tr>
      <td><b>Slaptažodis</b></td>
      <td><input name="password" type="password" class="textfield" id="password" size="10" /></td>
    </tr>
    <tr>
	  <td> <a href="register-form.php" > Registruotis </td>
      <td><input type="submit" name="Submit" value="Prisijungti" /></td>
    </tr>
	
  </table>
</form>
      </div>
      <div id="content">
        <!-- insert the page content here -->
       <td width="80%" valign="top" bgcolor="#d2d8c7">
<h2>Biblioteka</h2>
Čia yra mūsų grupės internetinės bibliotekos projektas
 </body>
</html>