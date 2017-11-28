<?php
include '../head.php';
?>

<h2>Local File Inclusion</h2>

<?php
if(isset($_GET['file'])) {
    $file = "text/".$_GET['file'];
    $myfile = fopen($file, "r") or die("Unable to open file!");
    echo "<p>".fread($myfile, filesize($file))."</p>";
    fclose($myfile);
}
?>

<?php
include '../foot.php';
?>
