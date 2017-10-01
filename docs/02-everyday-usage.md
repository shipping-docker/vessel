# Everyday Usage

## Composer

Often you can run Composer directly as usual, but you can run them within Vessel as well. You can use vessel's `composer` command or `comp` command for short.

```bash
# Use composer
./vessel composer <cmd>
./vessel comp <cmd> # "comp" is a shortcut to "composer"
```

For example, to install the AWS SDK, run:

```bash
./vessel composer require aws/aws-sdk-php
```

## Artisan

Artisan commands can be run as usual as well, except when they interact with the cache or database.

In those cases, we can use Vessel as well to run `artisan` or `art` for short.

```bash
./vessel artisan <cmd>
./vessel art <cmd> # "art" is a shortcut to "artisan"
```

All commands and flags are passed along to Artisan. For example, to run migrations and seed the database, use:

```bash
./vessel artisan migrate --seed
```

## Testing

We can use Vessel to run our tests as well! This is especially useful if you test with your database or SQLite.

Vessel has the `test` command to help us out here.

```bash
# Run phpunit tests
./vessel test
```

You can use any commands or flags you would normally use with phpunit as well.

```bash
./vessel test --filter=some.phpunit.filter
./vessel test tests/Unit/SpecificTest.php
```

## NodeJS/NPM/Yarn/Gulp

Vessel also builds a container with NodeJS, NPM, Yarn, and Gulp. This container isn't actively running but can be used whenever you like.

### NPM

Any NPM command can be run, such as `npm install foo`.

```bash
# Run npm
./vessel npm <cmd>

## Example: install deps
./vessel npm install
```

### Yarn

You may prefer to install and run tasks with Yarn.

```bash
./vessel yarn <cmd>

## Example: install dependencies
./vessel yarn install

## Watch for file changes
./vessel yarn watch

## Run the dev task
./vessel yarn run dev
```

### Gulp

If you are using Gulp, you can continue to use that as well.

```bash
./vessel gulp <cmd>
```

## Multiple Environments

Vessel attempts to bind to port 80 and 3306 on your machine, so you can simply go to `http://localhost` in your browser.

However, if you run more than one instance of Vessel, you'll get an error when starting it; Each port can only be used once. To get around this, use a different port per project by setting the `APP_PORT` and `MYSQL_PORT` environment variables in one of two ways:

Within your project's `.env` file:

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

The password for user `root` is set by environment variable `DB_PASS` from within the `.env` file.

> The port setting in SequelPro must match the `MYSQL_PORT` environment variable, which defaults to `3306`.

## MySQL

You'll likely find yourself needing to export and import MySQL databases.

### Exporting the Database


