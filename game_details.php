<?php
// Database connection
require_once 'admin/includes/database.php';

// Get game ID from URL
$game_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($game_id <= 0) {
    header('Location: index.php');
    exit();
}

// Get game details with platforms
$query = "SELECT g.*, GROUP_CONCAT(p.name SEPARATOR ', ') as platforms 
          FROM games g 
          LEFT JOIN game_platforms gp ON g.game_id = gp.game_id 
          LEFT JOIN platforms p ON gp.platform_id = p.platform_id 
          WHERE g.game_id = $game_id 
          GROUP BY g.game_id";
$result = mysqli_query($connect, $query);
$game = mysqli_fetch_assoc($result);

if (!$game) {
    header('Location: index.php');
    exit();
}

// Get reviews for this game
$reviews_query = "SELECT * FROM reviews WHERE game_id = $game_id ORDER BY date DESC";
$reviews_result = mysqli_query($connect, $reviews_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlentities($game['title']); ?> - GameHub</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-gamepad"></i>
                    <span>GameHub</span>
                </div>
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="admin/" class="admin-link">Admin Panel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Games</a>
            </div>

            <section class="game-details">
                <div class="game-header">
                    <div class="game-image-large">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <div class="game-info-large">
                        <h1><?php echo htmlentities($game['title']); ?></h1>
                        <p class="game-description-large"><?php echo htmlentities($game['description']); ?></p>
                        
                        <div class="game-meta-large">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span><strong>Developer:</strong> <?php echo htmlentities($game['developer']); ?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span><strong>Release Date:</strong> <?php echo date('F j, Y', strtotime($game['release_date'])); ?></span>
                            </div>
                            <?php if ($game['platforms']): ?>
                                <div class="meta-item">
                                    <i class="fas fa-tv"></i>
                                    <span><strong>Platforms:</strong> <?php echo htmlentities($game['platforms']); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="reviews-section">
                <h2>Reviews</h2>
                <?php if (mysqli_num_rows($reviews_result) > 0): ?>
                    <div class="reviews-container">
                        <?php while ($review = mysqli_fetch_assoc($reviews_result)): ?>
                            <div class="review-card">
                                <div class="review-header">
                                    <h3><?php echo htmlentities($review['headline']); ?></h3>
                                    <div class="review-rating">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star <?php echo $i <= $review['rating'] ? 'filled' : ''; ?>"></i>
                                        <?php endfor; ?>
                                        <span class="rating-text"><?php echo $review['rating']; ?>/5</span>
                                    </div>
                                </div>
                                <p class="review-text"><?php echo htmlentities($review['text']); ?></p>
                                <div class="review-date">
                                    <i class="fas fa-clock"></i>
                                    <?php echo date('F j, Y', strtotime($review['date'])); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="no-reviews">
                        <i class="fas fa-comment-slash"></i>
                        <p>No reviews yet for this game.</p>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 GameHub. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="script.js"></script>
</body>
</html> 