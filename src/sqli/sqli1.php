<?php
include '../head.php';
include '../DatabaseHandler.php';

$db = new DatabaseHandler();
?>

<h2>SQL Injection</h2>
<h3>Login</h3>

<form method="GET" id="login" action="sqli1.php">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="username">Username:</label>
            <input class="form-control" id="username" name="username"></input>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <label for="password">Password:</label>
            <input class="form-control" id="password" name="password"></input>
        </div>
    </div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    if ($db->CheckUser($username, $password)) {
        echo "<div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert'>&times;</a>
            <strong>Login erfolgreich</strong>
        </div>";
    } else {
        echo "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert'>&times;</a>
            <strong>Wrong username or password.</strong>
        </div>";
    }
}
?>

<?php
include '../foot.php';
$db->CloseConnection();
?>
