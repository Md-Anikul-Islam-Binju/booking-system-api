# Project Setup
composer update
# Project Setup .env
cp .env.example .env
# Project Setup Key
php artisan key:generate
# Project Setup migrate
php artisan migrate
# Create Admin & Service
php artisan db:seed
# API Check BASE url on local
http://127.0.0.1:8000/api
# API Check BASE url on Live
https://booking-system.veloswifte.com/api
# After Login Use Token On environment  Setup
