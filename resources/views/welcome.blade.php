<h1>Test on API Flow this step</h1>


<h5>Project Setup</h5>
1. composer update

<h5>Project Setup .env</h5>
2. cp .env.example .env

<h5>Project Setup Key</h5>
3. php artisan key:generate

<h5>Project Setup migrate</h5>
4. php artisan migrate

<h5>Create Admin & Service</h5>
5. php artisan db:seed


# API Check BASE url on local
6 .http://127.0.0.1:8000/api
# API Check BASE url on Live
7 .https://booking-system.veloswifte.com/api
# After Login Use Token On environment  Setup
