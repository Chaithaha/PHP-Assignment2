<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

$id = $_GET['id'];

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['developer'] and $_POST['description'] )
  {
    
    $query = 'UPDATE games SET title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'", developer = "'.mysqli_real_escape_string( $connect, $_POST['developer'] ).'", description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'", release_date = "'.mysqli_real_escape_string( $connect, $_POST['release_date'] ).'" WHERE game_id = '.$id.' LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Game has been updated' );
    
  }
  
  header( 'Location: games.php' );
  die();
  
}

$query = 'SELECT * FROM games WHERE game_id = '.$id.' LIMIT 1';
$result = mysqli_query( $connect, $query );
$record = mysqli_fetch_assoc( $result );

include( 'includes/header.php' );

?>

<h2>Edit Game</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
  
  <br>
  
  <label for="developer">Developer:</label>
  <input type="text" name="developer" id="developer" value="<?php echo htmlentities( $record['developer'] ); ?>">
  
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"><?php echo htmlentities( $record['description'] ); ?></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="release_date">Release Date:</label>
  <input type="date" name="release_date" id="release_date" value="<?php echo htmlentities( $record['release_date'] ); ?>">
  
  <br>
  
  <input type="submit" value="Update Game">
  
</form>

<p><a href="games.php"><i class="fas fa-arrow-circle-left"></i> Return to Game List</a></p>

<?php

include( 'includes/footer.php' );

?> 