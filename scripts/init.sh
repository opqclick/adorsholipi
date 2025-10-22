#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
cd "$ROOT"

echo "Creating Laravel project in ./backend (this may take a few minutes)..."
if [ -d "backend" ]; then
  echo "backend directory already exists — skipping composer create-project"
else
  composer create-project laravel/laravel backend
fi

cd backend

# copy .env example and set basic DB vars (edit .env later as needed)
cp .env.example .env || true
php -r "file_put_contents('.env', str_replace('DB_DATABASE=laravel', 'DB_DATABASE=adorsholipi', file_get_contents('.env')));" || true

echo "Installing auth scaffolding (laravel/ui) for Blade auth pages..."
composer require laravel/ui --no-interaction
php artisan ui:auth || true

echo "Generating models, migrations and seeder stubs..."
php artisan make:model Content -m
php artisan make:model ModerationLog -m
php artisan make:seeder AdminSeeder
php artisan make:controller Contributor/ContentController --resource
php artisan make:controller Admin/ModerationController

echo "Done. You still need to edit .env (DB settings), run migrations and seed the admin user:"
echo "  cd backend"
echo "  php artisan migrate"
echo "  php artisan db:seed --class=AdminSeeder"
echo ""
echo "Start dev server:"
echo "  php artisan serve --host=127.0.0.1 --port=8000"