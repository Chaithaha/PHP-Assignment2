# GameHub - Gaming Database Project

## Project Overview

GameHub is a comprehensive gaming database and review platform built with PHP and MySQL. The project consists of a user-facing frontend for browsing games and reading reviews, and an admin panel for managing the game database.

## Project Structure

```
PHP-Assignment2/
├── index.php              # Homepage - Browse all games
├── game_details.php       # Individual game details page
├── about.php              # About page
├── styles.css             # Main stylesheet
├── script.js              # JavaScript for interactions
├── gamedb.sql             # Database schema and sample data
├── README.md              # This documentation
└── admin/                 # Admin panel
    ├── index.php          # Admin redirect
    ├── dashboard.php      # Admin dashboard
    ├── games.php          # Manage games list
    ├── games_add.php      # Add new games
    ├── games_edit.php     # Edit existing games
    ├── reviews.php        # Manage reviews (placeholder)
    ├── platforms.php      # Manage platforms (placeholder)
    ├── users.php          # Manage users (placeholder)
    ├── logout.php         # Logout functionality
    ├── styles.css         # Admin-specific styles
    └── includes/          # Admin includes
        ├── config.php     # Configuration
        ├── database.php   # Database connection
        ├── functions.php  # Helper functions
        ├── header.php     # Admin header
        └── footer.php     # Admin footer
```

## Features

### For Users
- **Browse Games**: Visit the homepage to see all games in an attractive card layout
- **View Game Details**: Click on any game to see full details including description, developer, release date, and platforms
- **Read Reviews**: View user reviews with ratings for each game
- **About Page**: Learn about the project and its features

### For Admins
- **Access Admin Panel**: Navigate to `/admin/` (no login required for this demo)
- **Add Games**: Use the "Add Game" button to create new games
- **Edit Games**: Click the edit button next to any game to modify details
- **Delete Games**: Use the delete button with confirmation dialog
- **Manage Reviews**: View and manage game reviews (placeholder functionality)
- **Manage Platforms**: Handle gaming platforms (placeholder functionality)
- **Manage Users**: User management (placeholder functionality)

## Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Icons**: Font Awesome 6.0
- **Styling**: Custom CSS with modern gaming design

## Setup Instructions

### Prerequisites
- XAMPP (or similar local server with Apache and MySQL)
- PHP 7.4 or higher
- MySQL 5.7 or higher

### Installation Steps

1. **Clone/Download the Project**
   ```bash
   # Place the project in your XAMPP htdocs folder
   # Example: C:\xampp\htdocs\PHP-Assignment2\
   ```

2. **Set Up the Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database or use an existing one
   - Import the `gamedb.sql` file to set up the database structure and sample data

3. **Configure Database Connection**
   - Edit `admin/includes/database.php` if needed
   - Default settings:
     - Host: localhost
     - Username: root
     - Password: (empty)
     - Database: GamesDB

4. **Start the Application**
   - Start Apache and MySQL in XAMPP
   - Navigate to: `http://localhost/PHP-Assignment2/`

## Usage

### For Users
1. Visit the homepage to browse all games
2. Click on any game card to view detailed information
3. Read reviews and ratings for each game
4. Navigate to the About page to learn more about the project

### For Admins
1. Click "Admin Panel" in the navigation or go to `/admin/`
2. Use the dashboard to access different management features
3. Add new games with the "Add Game" button
4. Edit existing games by clicking the "Edit" link
5. Delete games using the "Delete" link (with confirmation)

## Design Features

- **Modern UI**: Clean, responsive design with gradient backgrounds
- **Card Layout**: Attractive game cards with hover effects
- **Responsive Design**: Works on desktop, tablet, and mobile devices
- **Interactive Elements**: Smooth animations and transitions
- **Professional Styling**: Consistent color scheme and typography
- **Gaming Theme**: Dark theme with neon accents and gaming aesthetics

## Sample Data

The database comes pre-populated with:
- 5 sample games across different genres
- 6 gaming platforms (PC, PlayStation 5, Xbox Series X, etc.)
- 8 sample reviews with ratings
- Platform associations for each game

## Security Notes

- This is a demo project with no authentication required for admin access
- In a production environment, proper authentication and authorization should be implemented
- Input validation and SQL injection protection should be enhanced

## Browser Compatibility

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers

## Contributing

This is a group assignment project. The backend was developed by the group, and the frontend was implemented to complete the application.

## License

This project is created for educational purposes as part of a PHP assignment.

---

**Note**: Make sure your XAMPP server is running and the database is properly set up before accessing the application.

## Quick Access URLs

- **User Interface**: `http://localhost/PHP-Assignment2/`
- **Admin Panel**: `http://localhost/PHP-Assignment2/admin/` 