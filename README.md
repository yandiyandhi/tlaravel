## 1 Menggunakan Artisan tanpa Docker

### Persyaratan

-   PHP 8.x
-   Composer
-   MySQL
-   Webserver

# Setup 1

git clone https://github.com/yandiyandhi/tlaravel.git
cd tlaravel
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan migrate:fresh --seed

## 2 Menggunakan Docker

### Persyaratan

-   Docker Desktop
-   Docker Compose

# Setup 2

-   setting .env rekomendasi gunakan setup database #Docker
-   docker compose up -d --build
-   jika terjadi kesalahan
-   docker stop laravel-db
-   docker rm laravel-db
-   docker stop laravel-app
-   docker rm laravel-app
-   docker compose up -d --build
-   docker compose exec app composer install
-   docker compose exec app php artisan key:generate
-   docker compose exec app php artisan migrate
-   docker compose exec app php artisan migrate:fresh --seed
-   http://localhost:8000

## 3 Menggunakan Docker & WSL2 (Performa lebih optimal)

### Persyaratan

-   Windows 10/11
-   WSL 2 (Ubuntu)
-   Docker Desktop (WSL Integration aktif)
-   VS Code + Extension WSL

# Setup 3

-   buka cmd ketikal wsl
-   cd ~
-   mkdir "Nama Folder"
-   Langkah sama dengan setup 1 dan setup 2
