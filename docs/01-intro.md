# Vessel

Up and running with small Docker dev environments.

## Install

Vessel is just a small set of files that sets up a local Docker-based dev environment per project. There is nothing to install globally, except Docker itself!

This is all there is to installing it in any given project:

```bash
composer require fideloper/vessel
php artisan vendor:publish --provider="Vessel\VesselServiceProvider"
```

> Note: You must install Docker to use this project. See Installing Docker for details and supported systems.

## Getting Started

Getting started is easy - just initialize vessel and start using it.

```bash
# Run this once to initialize project
# Must run with "bash" until initialized
bash vessel init

./vessel start
```

Because Vessel uses Redis for caching, the `init` command will install the `predis/predis` composer package if it is not already present.

> Starting Vessel for the first time will download the base Docker images from [https://hub.docker.com](https://hub.docker.com) and build our application container.
> 
> This will only need to be run the first time.

Head to `http://localhost` in your browser and see your Laravel site!

## Starting and Stopping Vessel

There's only a few commands to know to start or stop your containers. Database and Redis data is saved when you stop and restart Vessel.

### Starting Vessel

This will start your containers and listen on port 80 for web requests.

```bash
# Start the environment
./vessel start

## This is equivalent to
./vessel up -d
```

### Stoppig Vessel

Stopping Vessel will stop the containers and destroy them. They get recreated when you start Vessel back up. Your data (database/cache) is saved between restarts.

```bash
# Stop the environment
./vessel stop

## This is equivalent to
./vessel down
```


