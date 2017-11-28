<?php
include '../head.php';
include '../DatabaseHandler.php';

$db = new DatabaseHandler();
?>

<h2>SQL Injection</h2>
<h3>Read data</h3>

<?php
$users = $db->GetUsers();
foreach ($users as $user) {
    echo "<li class='list-group-item'>".$user."</li>";
}
?>

<?php
include '../foot.php';
$db->CloseConnection();
?>
