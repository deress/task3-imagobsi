# Feedback Form – Laravel + SQLite

## Instalasi & Setup

### 1. Clone/Download Project

Clone repository atau download zip project:
```bash
git clone https://github.com/deress/task3-imagobsi.git
cd task3-imagobsi
```
### 2. Install Dependensi

```bash
composer install
```

### 3. Copy File .env

```bash
cp .env.example .env
```

### 4. Konfigurasi Database SQLite pada env

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/ke/project/database/database.sqlite
```

### 5. Buat file SQLite kosong:
```bash
touch database/database.sqlite
```

### 6. Generate App Key & Migrasi Database
```bash
php artisan key:generate
php artisan migrate
```

### 7. Jalankan Server
```bash
php artisan serve
```
