<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

if( isset( $_GET['delete'] ) )
{
  
  $delete_id = (int)$_GET['delete'];
  $query = 'DELETE FROM reviews WHERE review_id = '.$delete_id.' LIMIT 1';
  mysqli_query( $connect, $query );
  
  set_message( 'Review has been deleted' );
  
  header( 'Location: reviews.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT r.*, g.title as game_title FROM reviews r JOIN games g ON r.game_id = g.game_id ORDER BY r.date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Reviews</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Game</th>
    <th align="left">Headline</th>
    <th align="center">Rating</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['review_id']; ?></td>
      <td align="left"><?php echo htmlentities( $record['game_title'] ); ?></td>
      <td align="left">
        <?php echo htmlentities( $record['headline'] ); ?>
        <small><?php echo htmlentities( substr($record['text'], 0, 100) ); ?>...</small>
      </td>
      <td align="center"><?php echo $record['rating']; ?>/10</td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( date('Y-m-d', strtotime($record['date'])) ); ?></td>
      <td align="center"><a href="reviews_edit.php?id=<?php echo $record['review_id']; ?>">Edit</a></td>
      <td align="center">
        <a href="reviews.php?delete=<?php echo $record['review_id']; ?>" onclick="return confirm('Are you sure you want to delete this review?');">Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="reviews_add.php"><i class="fas fa-plus-square"></i> Add Review</a></p>

<?php include( 'includes/footer.php' ); ?> 