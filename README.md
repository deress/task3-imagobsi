# Feedback Form – Laravel + SQLite

## Instalasi & Setup

### 1. Clone/Download Project

Clone repository atau download zip project:
git clone [<repository-url>](https://github.com/deress/task3-imagobsi.git) <nama-folder>
cd <nama-folder>

### 2. Install Dependensi

composer install

### 3. Copy File .env

cp .env.example .env

### 4. Konfigurasi Database SQLite

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/ke/project/database/database.sqlite

### 5. Buat file SQLite kosong:

touch database/database.sqlite

### 6. Generate App Key & Migrasi Database

php artisan key:generate
php artisan migrate

### 7. Jalankan Server

php artisan serve
