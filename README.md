# Translation System

A web-based translation management system built with Laravel (Blade + PHP) and a custom frontend. It provides a user interface for viewing, editing, importing, and exporting translation keys and values across multiple locales. The project focuses on making localization workflows easier by combining server-rendered views with interactive JavaScript features.

## Table of contents
- [Purpose](#purpose)
- [Features](#features)
- [Built With](#built-with)
- [Repository structure](#repository-structure)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Import / Export](#import--export)
- [Development notes](#development-notes)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)
- [Contact / Author](#contact--author)

## Purpose
This project provides a translation management interface intended for developers, product managers, and translators to:
- Browse and search translation keys
- Edit and save translations for multiple locales
- Add or remove translation keys
- Import and export translation files or data
- Integrate with Laravel's localization system or a database-backed translations store

While the backend uses PHP and Blade templates (Laravel-style), the frontend includes extensive styles and JavaScript to enable inline editing, filters, and AJAX-powered interactions for a smooth experience.

## Features
- List translation keys and show values for configured locales
- Inline editing of translation values with immediate saving (AJAX)
- Add, rename, and delete translation keys
- Locale management (add/remove locales)
- Search and filter capabilities for translation keys
- Import/export translations (CSV/JSON/PHP array files)
- Simple role-based restrictions (if auth is enabled)
- Responsive UI with custom CSS/SCSS styling

## Built With
- PHP (Laravel framework recommended)
- Blade templating engine for server-rendered views
- JavaScript for dynamic frontend behaviors (AJAX, inline editing)
- CSS / SCSS for styling and layout

Language composition in the repo:
- CSS (~62%)
- Blade templates (~22%)
- JavaScript (~8%)
- PHP (~7%)
- SCSS (~1%)

## Repository structure
This is a typical layout (adjust paths to match the repository content):

- app/
  - Http/
    - Controllers/
      - TranslationController.php
  - Models/
    - Translation.php
- config/
  - translation.php (optional)
- resources/
  - views/
    - translations/
      - index.blade.php
      - edit.blade.php
  - js/
    - translations.js
  - css/
    - translations.css
  - scss/
- routes/
  - web.php
- database/
  - migrations/
    - create_translations_table.php
- storage/ (for import/export files or cached data)
- README.md

(If your repo differs, update this section with actual paths/files.)

## Installation
These instructions assume a Laravel environment. If your project is structured differently, adapt accordingly.

1. Clone the repository:
   git clone https://github.com/KareemShaban1/translation_system.git
   cd translation_system

2. Install PHP dependencies (Composer):
   composer install

3. Install frontend dependencies (if package.json exists):
   npm install
   npm run dev   # or npm run build for production

4. Copy the environment file and set environment variables:
   cp .env.example .env
   Edit .env and set database credentials and app URL.

5. Generate an application key (Laravel):
   php artisan key:generate

6. Run migrations:
   php artisan migrate

7. Seed sample translations (optional):
   php artisan db:seed --class=TranslationSeeder

8. Serve the application:
   php artisan serve

## Configuration
- config/translation.php (if present): define supported locales, fallback locale, storage mode (file vs DB).
- .env keys: APP_LOCALES, DB_* etc. Add any custom env variables your code expects (e.g., TRANSLATION_DRIVER=file|db).

## Usage
- Access the translation management UI at the configured route (e.g., /translations).
- Use inline editing to modify translations and click save to persist.
- Add or remove locales through the locale management section (if implemented).
- Use search/filter inputs to find specific keys.
- Admin users (if auth present) can manage keys and perform imports/exports.

## Import / Export
- Import: upload CSV/JSON/PHP arrays to bulk insert or update translations. Check the import controller for accepted formats and column layout.
- Export: generate locale-specific or full-project translation files for download. Exports may create PHP array files, JSON, or CSV depending on the implemented exporter.

## Development notes
- Blade templates live under resources/views and are heavily styled — review CSS files under resources/css and SCSS under resources/scss.
- JavaScript powering inline editing and AJAX calls lives under resources/js (or public/js). Look for event listeners on translation fields and the route endpoints they call.
- Backend endpoints are defined in routes/web.php — check route names and middleware (auth, can:manage-translations).
- If translations are stored in database, the Translation model and its migration define the schema. Typical columns: id, locale, group (or namespace), key, value, status, created_at, updated_at.

## Testing
- Add PHPUnit tests under tests/ for controllers and model behavior.
- For frontend behavior, consider using Laravel Dusk or a JavaScript testing framework to cover inline editing and API interactions.

## Contributing
Contributions are welcome. Suggested workflow:
1. Fork the repository.
2. Create a feature branch: git checkout -b feature/your-feature
3. Make changes and add tests.
4. Submit a pull request describing your changes and why they are needed.

Please follow the existing code style and include descriptive commit messages.

## Troubleshooting
- Common issues:
  - Missing locales: ensure config/locales or .env includes required locales.
  - Permission errors when writing files: ensure storage/ and bootstrap/cache have correct permissions.
  - AJAX failing: check browser console and ensure CSRF token is included with requests.

## License
Specify your license here (e.g., MIT). If none is included, add a LICENSE file to the repository.

## Contact / Author
KareemShaban1 — https://github.com/KareemShaban1

---
