# User Authentication System (Laravel)

A simple user authentication system built with **Laravel** and **Tailwind CSS**.  
This project includes user registration, login, dashboard access, and basic role support for admin users.

## Features

- User registration
- User login/logout
- Protected dashboard for authenticated users
- User listing page (for authorized/admin access)
- Admin flag support via `is_admin` field
- Clean UI using Tailwind CSS

## Tech Stack

- PHP
- Laravel
- Blade Templates
- Tailwind CSS
- MySQL (or any Laravel-supported database)

## Project Structure (Key Files)

- `routes/web.php` – application routes
- `app/Http/Controllers/UserController.php` – user-related logic
- `app/Models/User.php` – user model
- `app/Providers/AuthServiceProvider.php` – authorization/policies setup
- `resources/views/dashboard.blade.php` – dashboard UI
- `resources/views/users/index.blade.php` – users list UI
- `database/migrations/2026_04_21_173422_add_is_admin_to_users_table.php` – admin column migration
## screenshots


## Installation

1. Clone repository:
   ```bash
   git clone https://github.com/CAjmnz/Registration-and-Login-System-.git
   cd Registration-and-Login-System-
2. Install dependencies:
   ```bash
   composer install
   npm install
3. Create and configure environment:
   ```bash
    cp .env.example .env
    php artisan key:generate
4. Set your database credentials in .env, then run:
   ```bash
    php artisan migrate
5. Build frontend assets:
   ```bash
   npm run dev
6. Start the app:
   ```bash
   php artisan serve
## patch notes 
   ```bash
   2.1 improve UI
   2.2 working with a simple settings
   2.3 fixing the settings
   2.4 adding the themes
   2.5 coffee theme
## Future updates:
   ```bash
   3.1 deployment 
