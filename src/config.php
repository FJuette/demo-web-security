<?php
include 'head.php';
include 'DatabaseHandler.php';

$db = new DatabaseHandler();
if ($db->DatabaseExists()) {
	echo '<button type="button" class="btn btn-primary" onclick="ResetDatabase();">Reset database</button>';
} else {
	echo '<button type="button" class="btn btn-primary" onclick="CreateDatabase();">Create database</button>';
}

?>


<div id="info">
</div>

<?php
include 'foot.php';
?>
