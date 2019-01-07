# Vessel

Up and running with small Docker dev environments.

## Documentation

Full documentation can be found at [https://vessel.shippingdocker.com](https://vessel.shippingdocker.com).

## Install

Vessel is just a small set of files that sets up a local Docker-based dev environment per project. There is nothing to install globally, except Docker itself!

This is all there is to using it:

```bash
composer require shipping-docker/vessel
php artisan vendor:publish --provider="Vessel\VesselServiceProvider"

# Run this once to initialize project
# Must run with "bash" until initialized
bash vessel init

./vessel start
```

Head to `http://localhost` in your browser and see your Laravel site!

## Lumen

If you're using Lumen, you'll need to copy the Vessel files over manually instead of using `php artisan vendor:publish`. You can do this with this command:

    cp -R vendor/shipping-docker/vessel/docker-files/{vessel,docker-compose.yml,docker} .
    
and then you'll be able to install and continue as normal.
    
    
## Multiple Environments

Vessel attempts to bind to port 80 and 3306 on your machine, so you can simply go to `http://localhost` in your browser.

However, if you run more than one instance of Vessel, you'll get an error when starting it; Each port can only be used once. To get around this, use a different port per project by setting the `APP_PORT` and `MYSQL_PORT` environment variables in one of two ways:

Within the `.env` file:

```
APP_PORT=8080
MYSQL_PORT=33060
```

Or when starting Vessel:

```bash
APP_PORT=8080 MYSQL_PORT=33060 ./vessel start
```

Then you can view your project at `http://localhost:8080` and access your database locally from port `33060`;

## Sequel Pro

Since we bind the MySQL to port `3306`, SequelPro can access the database directly.

![sequel pro access](https://s3.amazonaws.com/sfh-assets/vessel-sequel-pro.png)

The password for user `root` is set by environment variable `DB_PASSWORD` from within the `.env` file.

> The port setting must match the `MYSQL_PORT` environment variable, which defaults to `3306`.

## Common Commands

Here's a list of built-in helpers you can use. Any command not defined in the `vessel` script will default to being passed to the `docker-compose` command. If not command is used, it will run `docker-compose ps` to list the running containers for this environment.

### Starting and Stopping Vessel

```bash
# Start the environment
./vessel start

## This is equivalent to
./vessel up -d

# Stop the environment
./vessel stop

## This is equivalent to
./vessel down
```

### Development

```bash
# Use composer
./vessel composer <cmd>
./vessel comp <cmd> # "comp" is a shortcut to "composer"

# Use artisan
./vessel artisan <cmd>
./vessel art <cmd> # "art" is a shortcut to "artisan"

# Run tinker REPL
./vessel tinker # "tinker" is a shortcut for "artisan tinker"

# Run phpunit tests
./vessel test

## Example: You can pass anything you would to phpunit to this as well
./vessel test --filter=some.phpunit.filter
./vessel test tests/Unit/SpecificTest.php


# Run npm
./vessel npm <cmd>

## Example: install deps
./vessel npm install

# Run yarn

./vessel yarn <cmd>

## Example: install deps
./vessel yarn install

# Run gulp
./vessel gulp <cmd>
```

### Docker Commands

As mentioned, anything not recognized as a built-in command will be used as an argument for the `docker-compose` command. Here's a few handy tricks:

```bash
# Both will list currently running containers and their status
./vessel
./vessel ps

# Check log output of a container service
./vessel logs # all container logs
./vessel logs app # nginx | php logs
./vessel logs mysql # mysql logs
./vessel logs redis # redis logs

## Tail the logs to see output as it's generated
./vessel logs -f # all logs
./vessel logs -f app # nginx | php logs

## Tail Laravel Logs
./vessel exec app tail -f /var/www/html/storage/logs/laravel.log

# Start a bash shell inside of a container
# This is just like SSH'ing into a server
# Note that changes to a container made this way will **NOT** 
#   survive through stopping and starting the vessel environment
#   To install software or change server configuration, you'll need to
#     edit the Dockerfile and run: ./vessel build
./vessel exec app bash

# Example: mysqldump database "homestead" to local file system
#          We must add the password in the command line this way
#          This creates files "homestead.sql" on your local file system, not
#          inside of the container
# @link https://serversforhackers.com/c/mysql-in-dev-docker
./vessel exec mysql mysqldump -u root -psecret homestead > homestead.sql
```


## What's included?

The aim of this project is simplicity. It includes:

* PHP 7.3
* MySQL 5.7
* Redis ([latest](https://hub.docker.com/_/redis/))
* NodeJS ([latest](https://hub.docker.com/_/node/)), with Yarn & Gulp

## How does this work?

If you're unfamiliar with Docker, try out this [Docker in Development](https://serversforhackers.com/s/docker-in-development) course, which explains important topics in how this is put together.

If you want to see how this workflow was developed, check out [Shipping Docker](https://serversforhackers.com/shipping-docker) and signup for the free course module which explains building this Docker workflow.

## Supported Systems

Vessel requires Docker, and currently only works on Windows, Mac and Linux.

> Windows requires running Hyper-V.  Using Git Bash (MINGW64) and WSL are supported.  Native
  Windows is still under development.

| Mac           | Linux         | Windows |
| ------------- |:-------------:|:-------:|
| Install Docker on [Mac](https://docs.docker.com/docker-for-mac/install/) | Install Docker on [Debian](https://docs.docker.com/engine/installation/linux/docker-ce/debian/) | Install Docker on [Windows](https://docs.docker.com/docker-for-windows/install/) |
|       | Install Docker on [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/) | |
|       | Install Docker on [CentOS](https://docs.docker.com/engine/installation/linux/docker-ce/centos/) | |
