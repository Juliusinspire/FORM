<!DOCTYPE HTML>
<html>
<body>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "tegx";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

?>

<table border="1" align="center">
<tr>
  <td>a</td>
  <td>b</td>
  <td>c</td>
  <td>d</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT * FROM user1")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['a']}</td>
    <td>{$row['b']}</td>
    <td>{$row['c']}</td>
    <td>{$row['d']}</td>
   </tr>\n";


}

?>
</table>
</body>
</html>