<?php
include 'head.php';
?>

      <div class="jumbotron">
        <h1>Web security demo</h1>
        <p>MariaDb Server name: <?php echo getenv('DB_SERVER') ?: "localhost" ?></p>
        <p>MariaDb root password: <?php echo getenv('DB_PASSWORD') ?: "" ?></p>
		<p><a href="<?php echo getenv('DB_ADMIN') ? 'http://localhost:'.getenv('DB_ADMIN') : "http://localhost/phpmyadmin/" ?>" target="_blank">phpMyAdmin</a></p>
      </div>

<?php
include 'foot.php';
?>
