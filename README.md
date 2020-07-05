# vh-coding-challenge

A coding challenge for [veganhacktivists.org](https://veganhacktivists.org). Based on [docker-compose-laravel](https://github.com/aschmelyun/docker-compose-laravel).

## Install

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

- First edit your `src/.env` file after copying the `src/.env.example` file. 
- Run `bin/composer install` to install the composer packages.
- Build the Docker image with `docker-compose build`
- Run `bin/artisan migrate` to install the databases.
- Then run `docker-compose up -d` to spin up the project.

Open up your browser of choice to [http://localhost:8080](http://localhost:8080) and you should see your Laravel app running as intended.

## Tests

Run `bin/artisan test` to run the tests.

## Persistent MySQL Storage

By default, whenever you bring down the docker-compose network, your MySQL data will be removed after the containers are destroyed. If you would like to have persistent data that remains after bringing containers down and back up, do the following:

1. Create a `mysql` folder in the project root, alongside the `nginx` and `src` folders.
2. Under the mysql service in your `docker-compose.yml` file, add the following lines:

```
volumes:
  - ./mysql:/var/lib/mysql
```
