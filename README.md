# 🎬 Movie News

**Movie News** is a Laravel-based web application for managing and displaying movie-related newsletters. The platform supports full **CRUD operations with authentication**, and includes a global search feature, responsive design, and a modular structure for scalable development.

---

## 🛠️ Tech Stack

- **Backend Framework:** Laravel (PHP)
- **Frontend:** Blade templates + Tailwind CSS
- **Authentication:** Laravel Breeze (or similar)
- **Database:** MySQL/PostgreSQL
- **Containerization:** Docker (via `docker-compose.yml`)

---

## 📁 Project Structure (Simplified)
```
Movie_News/
├── app/                 # Application logic (controllers, models, etc.)
├── bootstrap/           # Laravel bootstrapping
├── config/              # Application configuration
├── database/            # Migrations and seeders
├── public/              # Public assets and index.php
├── resources/
│   ├── views/           # Blade templates
│   └── css/js/          # Tailwind and Vite assets
├── routes/              # Web/API routes
├── storage/             # Logs, compiled views, etc.
├── tests/               # Feature/unit tests
├── vendor/              # Composer dependencies
├── .env.example         # Environment variable template
├── docker-compose.yml   # Docker service configuration
├── tailwind.config.js   # Tailwind CSS config
├── vite.config.js       # Vite build config
└── artisan              # Laravel CLI entry point
```
## ⚠️ Current Status

> **Note:** The application is **not currently running** because the Docker environment has been shut down.
