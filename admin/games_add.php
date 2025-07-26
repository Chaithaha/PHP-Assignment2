<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['developer'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO games (
        title,
        developer,
        description,
        release_date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['developer'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['release_date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Game has been added' );
    
  }
  
  header( 'Location: games.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Game</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="developer">Developer:</label>
  <input type="text" name="developer" id="developer">
  
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
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
  <input type="date" name="release_date" id="release_date">
  
  <br>
  
  <input type="submit" value="Add Game">
  
</form>

<p><a href="games.php"><i class="fas fa-arrow-circle-left"></i> Return to Game List</a></p>

<?php

include( 'includes/footer.php' );

?> 