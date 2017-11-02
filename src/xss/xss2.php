<?php
include '../head.php';
include '../DatabaseHandler.php';

$db = new DatabaseHandler();
?>

<h2>Cross Site Scripting</h2>
<h3>Persistent</h3>

<?php
if (ISSET($_POST['comment'])) {
	$db->AddComment($_POST['comment']);
}
?>
<form method="POST" id="comments" action="xss2.php">

	<div class="form-group">
	  <label for="comment">Comment:</label>
	  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<h4>Entries</h4>
<ul class="list-group">
<?php
	$comments = $db->ReadComments();
	foreach ($comments as $comm) {
		echo "<li class='list-group-item'>".$comm."</li>";
	}
?>
</ul> 

<?php
include '../foot.php';
$db->CloseConnection();
?>
