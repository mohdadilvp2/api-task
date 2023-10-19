# [API TESTING APP]

----------

# Getting started
API Testing app made with Laravel
## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)



Clone the repository

    git clone https://github.com/mohdadilvp2/api-task.git

Switch to the repo folder

    cd api-task

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


`


----------

## Docker (Sail)

To install with [Docker](https://www.docker.com) using [Sail](https://laravel.com/docs/10.x/sail), run following commands:

```
git clone https://github.com/mohdadilvp2/api-task.git
cd api-task
cp .env.example .env
composer install
php artisan sail:install
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail up
```
To migrate db
```
sail artisan migrate
```
----------
## Testing
```
php artisan test
```
with sail
```
sail artisan test
```
----------
## Project Description


</br>
In this project we are fetching data from wikipedia and youtube and mergeing them together.

### Endpoint GET  api/v1/get_country_data
#### Description
This endpoint will fetch data from both wikipedia and youtube for a country
#### Parameters
- **country_code** (string, required): [gb, nl, de, fr, es, it, gr].
- **per_page** (int, required): Maximum videos per page.
- **page_token** (string, optional): Page token to fetch page from youtube api.

#### Response

- Status Code: 200 OK