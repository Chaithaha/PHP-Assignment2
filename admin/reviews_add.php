<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

if( isset( $_POST['headline'] ) )
{
  
  if( $_POST['headline'] and $_POST['text'] and $_POST['game_id'] and $_POST['rating'] and is_numeric($_POST['game_id']) and is_numeric($_POST['rating']) and $_POST['rating'] >= 1 and $_POST['rating'] <= 10 )
  {
    
    $query = 'INSERT INTO reviews (
        game_id,
        headline,
        text,
        rating,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['game_id'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['headline'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['text'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['rating'] ).'",
         NOW()
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Review has been added' );
    
  }
  
  header( 'Location: reviews.php' );
  die();
  
}

// Get all games for the dropdown
$games_query = 'SELECT game_id, title FROM games ORDER BY title';
$games_result = mysqli_query( $connect, $games_query );

include( 'includes/header.php' );

?>

<h2>Add Review</h2>

<form method="post">
  
  <label for="game_id">Game:</label>
  <select name="game_id" id="game_id" required>
    <option value="">Select a game...</option>
    <?php while( $game = mysqli_fetch_assoc( $games_result ) ): ?>
      <option value="<?php echo $game['game_id']; ?>"><?php echo htmlentities( $game['title'] ); ?></option>
    <?php endwhile; ?>
  </select>
  
  <br>
  
  <label for="headline">Headline:</label>
  <input type="text" name="headline" id="headline" required>
    
  <br>
  
  <label for="text">Review Text:</label>
  <textarea name="text" id="text" rows="10" required></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#text' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="rating">Rating (1-10):</label>
  <select name="rating" id="rating" required>
    <option value="">Select rating...</option>
    <?php for($i = 1; $i <= 10; $i++): ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?>/10</option>
    <?php endfor; ?>
  </select>
  
  <br>
  
  <input type="submit" value="Add Review">
  
</form>

<p><a href="reviews.php"><i class="fas fa-arrow-circle-left"></i> Return to Review List</a></p>

<?php

include( 'includes/footer.php' );

?>
