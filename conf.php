<?
// connect to MySQL
$dbServer ="localhost";
$dbUser ="root";
$dbPass="root";
$dbBase="gallery";

$conn = mysqli_connect($dbServer,$dbUser,$dbPass,$dbBase) or die('No connect to DB');;

?>