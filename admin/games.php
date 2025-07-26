<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM games WHERE game_id = '.$_GET['delete'].' LIMIT 1';
  mysqli_query( $connect, $query );
  
  set_message( 'Game has been deleted' );
  
  header( 'Location: games.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT * FROM games ORDER BY release_date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Games</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="left">Developer</th>
    <th align="center">Release Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['game_id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo htmlentities( substr($record['description'], 0, 100) ); ?>...</small>
      </td>
      <td align="left"><?php echo htmlentities( $record['developer'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['release_date'] ); ?></td>
      <td align="center"><a href="games_edit.php?id=<?php echo $record['game_id']; ?>">Edit</a></td>
      <td align="center">
        <a href="games.php?delete=<?php echo $record['game_id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this game?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="games_add.php"><i class="fas fa-plus-square"></i> Add Game</a></p>

<?php include( 'includes/footer.php' ); ?> 