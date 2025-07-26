# Games Management System

A streamlined admin panel built with PHP and MySQL for managing video game entries. This system provides administrators with a complete CRUD (Create, Read, Update, Delete) interface to manage game information including titles, developers, release dates, and descriptions. The focus is on simplicity and efficiency, offering all necessary tools for game database management in one centralized admin interface.

## Setup and Requirements
The system runs on a XAMPP environment with PHP and MySQL. To get started, import the included `gamedb.sql` file to set up your database structure. Configure your database connection by creating a `database.php` file in the `admin/includes` directory based on the provided example. Access the admin panel through your local server at `http://localhost/Php-Proj/admin/`.

## Project Structure

```
Php/
├── admin/
│   ├── includes/
│   │   ├── database.php     # Database connection
│   │   ├── config.php       # Session and headers
│   │   ├── functions.php    # Helper functions
│   │   ├── header.php       # HTML header
│   │   └── footer.php       # HTML footer
│   ├── index.php            # Redirects to dashboard
│   ├── dashboard.php        # Admin dashboard
│   ├── games.php            # List/delete games
│   ├── games_add.php        # Add new game
│   ├── games_edit.php       # Edit game
│   ├── reviews.php          # Reviews placeholder
│   ├── platforms.php        # Platforms placeholder
│   ├── users.php            # Users placeholder
│   ├── logout.php           # Logout (redirects to dashboard)
│   └── styles.css           # Admin styling
├── index.php                # Public homepage
├── game.php                 # Individual game page
├── styles.css               # Public styling
└── gamedb.sql              # Database schema
```

## Database Schema

### Tables
- **games**: Game information (title, developer, description, release date)
- **platforms**: Gaming platforms (PC, PlayStation, Xbox, etc.)
- **reviews**: Game reviews (rating, headline, text, date)
- **game_platforms**: Many-to-many relationship between games and platforms

### Sample Data
The database comes pre-populated with:
- 6 gaming platforms
- 5 sample games
- 8 sample reviews
- Game-platform relationships

## Setup Instructions

### Prerequisites
- XAMPP, WAMP, or similar local server with PHP and MySQL
- Web browser

### Installation Steps

1. **Start your local server** (XAMPP/WAMP)
   - Start Apache and MySQL services

2. **Import the database**
   - Open phpMyAdmin (usually at http://localhost/phpmyadmin)
   - Create a new database or use existing one
   - Import the `gamedb.sql` file

3. **Place files in web directory**
   - Copy all project files to your web server directory
   - Example: `C:\xampp\htdocs\game-cms\`

4. **Access the website**
   - Public site: `http://localhost/game-cms/`
   - Admin panel: `http://localhost/game-cms/admin/`

## Usage

### For Users
1. **Browse Games**: Visit the homepage to see all games
2. **View Details**: Click on any game to see full details

### For Admins
1. **Access Admin Panel**: Go to `/admin/` (no login required)
2. **Add Games**: Use "Add Game" button to create new games
3. **Edit Games**: Click the edit button next to any game
4. **Delete Games**: Use the delete button (with confirmation)

## CRUD Operations Demonstrated

### Create (C)
- Add new games with title, developer, description, release date
- Form validation and error handling

### Read (R)
- Display games in a simple list
- Show individual game details

### Update (U)
- Edit existing games
- Maintain data integrity

### Delete (D)
- Delete games with confirmation
- Simple and safe deletion process

## Technical Features

- **PHP mysqli**: Simple database connections
- **Session Management**: Basic session handling
- **Form Validation**: Basic input validation
- **Security**: SQL injection prevention
- **Simple Design**: Easy to read and understand code

## Code Patterns

This project follows the same patterns as the php-cms example:
- **File Structure**: Organized admin/includes/ pattern
- **Database Connection**: mysqli_connect() approach
- **Form Handling**: Simple POST processing
- **Security**: mysqli_real_escape_string() for input
- **Styling**: Custom CSS without frameworks

## Future Development

The following features are planned for future development:
- **Authentication System**: User login and role management
- **Review Management**: Full CRUD for game reviews
- **Platform Management**: Full CRUD for gaming platforms
- **User Management**: Admin user account management
- **File Uploads**: Image upload for games
- **Search & Filtering**: Advanced search capabilities

## Notes

- **No Authentication**: This version has no login requirement for easy development
- **Placeholder Pages**: Reviews, platforms, and users pages are placeholders
- **Simple Structure**: Designed for easy understanding and modification 