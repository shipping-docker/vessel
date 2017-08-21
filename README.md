# Vessel
Up and running with small Docker dev environments.

## Install

Vessel is just a small set of files that sets up a local Docker-based dev environment per project. There is no thing to install globally, except Docker itself!

This is it!

```bash
composer require fideloper/vessel
php artisan vendor:publish --provider="Vessel\VesselServiceProvider"

# Run this once to set 
# project .env file
./vessel env

./vessel start
```

Head to `http://localhost` in your browser and see your Laravel site!

## Multiple Environments

Vessel attempts to bind to port 80 on your machine, so you can simply go to `http://localhost` in your browser.

However, if you run more than one instance of Vessel, you'll get an error when starting it; Port 80 can only be used once. To get around this, use a different port per project by setting the `APP_PORT` environment variable in one of two ways:

Within the .env file:

```
APP_PORT=8080
```

Or when starting Vessel:

```bash
APP_PORT=8080 ./vessel start
```

Then you can view your project at `http://localhost:8080`.

## How does this work?

If you're unfamiliar with Docker, try out this [Docker in Development](https://serversforhackers.com/s/docker-in-development) course, which explains important topics in how this is put together.

If you want to see how this workflow was developed, check out [Shipping Docker](https://serversforhackers.com/shipping-docker) and signup for the free course module which explains building this Docker workflow.

## Supported Systems

Vessel requires Docker, and currenty only works on Mac and Linux.

> Window support may come in the future. It will require running Hyper-V.

| Mac           | Linux         | Windows |
| ------------- |:-------------:|:-------:|
| Install Docker on [Mac](https://docs.docker.com/docker-for-mac/install/) | Install Docker on [Debian](https://docs.docker.com/engine/installation/linux/docker-ce/debian/) | Not Currently Supported |
|       | Install Docker on [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/) | |
|       | Install Docker on [CentOS](https://docs.docker.com/engine/installation/linux/docker-ce/centos/) | |
