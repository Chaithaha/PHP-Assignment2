<!doctype html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

  <title>Game CMS Admin</title>

  <link href="styles.css" type="text/css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

</head>
<body>

  <h1>Game CMS Admin</h1>

  <p style="padding: 0 1%; text-align: center;">
    <a href="dashboard.php">Dashboard</a> |
    <a href="games.php">Games</a> |
    <a href="reviews.php">Reviews</a> |
    <a href="platforms.php">Platforms</a> |
    <a href="users.php">Users</a> |
    <a href="logout.php">Logout</a>
  </p>

  <hr>

  <?php echo get_message(); ?>

  <div style="max-width: 1500px; margin: auto; padding: 0 1%;"> 