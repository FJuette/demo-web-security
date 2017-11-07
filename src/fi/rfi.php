<?php
include '../head.php';
?>

<h2>Remote File Inclusion</h2>

<?php
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    include $page;
}
?>

<?php
include '../foot.php';
?>
