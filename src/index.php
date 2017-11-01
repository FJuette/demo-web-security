<?php
include 'head.php';
?>

<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Web security demo</h1>
        <p>MySql Server name: <?php echo getenv('DB_SERVER') ?: "localhost" ?></p>
        <p>MySql root password: <?php echo getenv('DB_PASSWORD') ?: "" ?></p>
      </div>

<?php
include 'foot.php';
?>
