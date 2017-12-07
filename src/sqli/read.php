<?php
include '../head.php';
include '../DatabaseHandler.php';

$db = new DatabaseHandler();
?>

<h2>SQL Injection</h2>
<h3>Read data</h3>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $user = $db->GetUserInformationById($id);
    $sep = var_dump($user);
    echo "<div>".$sep."</div>";
}
?>

<?php
include '../foot.php';
$db->CloseConnection();
?>
