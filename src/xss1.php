<?php
include 'head.php';
?>
<h2>Cross Site Scripting</h2>
<h3>Non-Persistent</h3>

<?php
if (ISSET($_GET['name'])) {
	$name = $_GET['name'];
	echo "Welcome $name<br>";
}
echo "<a class='btn btn-success' href='http://google.com/'>Go to Google</a>";

include 'foot.php';
?>
