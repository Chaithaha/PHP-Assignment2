<?php
// Database connection
require_once 'admin/includes/database.php';

// Get all games with their platforms
$query = "SELECT g.*, GROUP_CONCAT(p.name SEPARATOR ', ') as platforms 
          FROM games g 
          LEFT JOIN game_platforms gp ON g.game_id = gp.game_id 
          LEFT JOIN platforms p ON gp.platform_id = p.platform_id 
          GROUP BY g.game_id 
          ORDER BY g.release_date DESC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub - Browse Games</title>
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
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="admin/" class="admin-link">Admin Panel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <section class="hero">
                <div class="hero-content">
                    <h1>Discover Amazing Games</h1>
                    <p>Explore our collection of the latest and greatest games across all platforms</p>
                </div>
            </section>

            <section class="games-grid">
                <h2>All Games</h2>
                <div class="games-container">
                    <?php while ($game = mysqli_fetch_assoc($result)): ?>
                        <div class="game-card">
                            <div class="game-image">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="game-info">
                                <h3><?php echo htmlentities($game['title']); ?></h3>
                                <p class="game-description"><?php echo htmlentities($game['description']); ?></p>
                                <div class="game-meta">
                                    <span class="developer">
                                        <i class="fas fa-user"></i>
                                        <?php echo htmlentities($game['developer']); ?>
                                    </span>
                                    <span class="release-date">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo date('M j, Y', strtotime($game['release_date'])); ?>
                                    </span>
                                </div>
                                <?php if ($game['platforms']): ?>
                                    <div class="platforms">
                                        <i class="fas fa-tv"></i>
                                        <?php echo htmlentities($game['platforms']); ?>
                                    </div>
                                <?php endif; ?>
                                <a href="game_details.php?id=<?php echo $game['game_id']; ?>" class="view-details-btn">
                                    View Details
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
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