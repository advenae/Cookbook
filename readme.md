# Cookbook
"An online cookbook application"

## Requirements

- MySQL database server version 8.3
- PHP version 8.3
- PhpStorm development environment

## Installation

### Clone

- Clone this repo to your local machine using `https://github.com/advenae/Cookbook`

### Setup

- Change the database connection information in the .env file

> In the app directory:
```shell
$ composer install
$ bin/console doctrine:migrations:migrate
$ bin/console doctrine:fixtures:load
```

- The home page is at `/recipe`
