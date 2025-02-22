# Ikasda Website Development Using Laravel + CMS Filament + Tailwind CSS

## This guide will walk you through the steps to clone, set up, and run the GitHub repository for the Ikasda Madiun project.

## Prerequisites
Before you begin, ensure you have the following installed on your system:

- **Git** - [Download Git](https://git-scm.com/downloads)
- **Composer** - [Download Composer](https://getcomposer.org/download/)
- **Node.js** (includes npm) - [Download Node.js](https://nodejs.org/)
- **PHP** (version 8.0 or higher) - [Download PHP](https://www.php.net/downloads)
- **Database** (e.g., MySQL, PostgreSQL, or SQLite) - Ensure it's installed and running.

## Steps to Clone and Run the Project

### 1. Clone the Repository
Open your terminal or command prompt and run the following command to clone the repository:

```bash
git clone https://github.com/ImamKhusain/ikasda-madiun.git
```
This will create a local copy of the project on your machine.

### 2. Navigate to the Project Directory
Change into the project directory:

```bash
cd ikasda-madiun
```

### 3. Install PHP Dependencies
Run the following command to install the required PHP dependencies using Composer:

```bash
composer install
```

### 4. Install JavaScript Dependencies
Install the required JavaScript dependencies using npm:

```bash
npm install
```

### 5. Set Up the Database
Create a database for the project (e.g., `ikasda_madiun`).

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ikasda_madiun
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Generate an application key:

```bash
php artisan key:generate
```

Run the migrations to create the database tables:

```bash
php artisan migrate
```

Seed the database with initial data (if applicable):

```bash
php artisan db:seed
```

### 6. Build Assets
To compile the frontend assets, run one of the following commands:

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 7. Serve the Application
Start the local development server using Laravel's built-in server:

```bash
php artisan serve
```

This will start the server at `http://localhost:8000`.

### 8. Access the Application
Open your browser and navigate to:

```
http://localhost:8000/dashboard
```

You should now see the application running!

## Troubleshooting

- **Composer or npm issues**: Ensure you have the latest versions installed.
- **Database connection errors**: Double-check your `.env` file for correct database credentials.
- **Missing dependencies**: Run `composer install` and `npm install` again.

## License
This project is open-source and available under the MIT License.

Happy coding! 🚀

