<?php
include '../head.php';

?>

<h2>Command Injection</h2>

<?php

$hostname = $_GET['host'];
$data = system("host $hostname");
print "<p>$data</p>";

include '../foot.php';
?>
