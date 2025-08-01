<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );
include( 'includes/header.php' );
?>

<ul id="dashboard">
  <li>
    <a href="games.php">
      Manage Games
    </a>
  </li>
  <li>
    <a href="reviews.php">
      Manage Reviews
    </a>
  </li>
  <li>
    <a href="platforms.php">
      Manage Platforms (Placeholder)
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users (Placeholder)
    </a>
  </li>
  <li>
    <a href="logout.php">
      Logout
    </a>
  </li>
</ul>

<?php

include( 'includes/footer.php' );

?> 