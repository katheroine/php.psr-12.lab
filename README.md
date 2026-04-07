# PHP.PSR-12.lab

Laboratory of PSR-12: Extended Coding Style.

> This repository is a standalone part of a larger project: **[PHP.lab](https://github.com/katheroine/php.lab)** — a curated knowledge base and laboratory for PHP engineering.

**Usage**

To run the example application with *Docker* use command:

```console
docker compose up -d
```

After creating the *Docker container* the *Composer dependencies* have to be defined and installed:

```console
docker compose exec application composer require --dev squizlabs/php_codesniffer \
&& docker compose application composer install
```

Tom make *PHP Code Sniffer commands* easily accessible run:

```console
docker compose exec application ln -s /var/www/vendor/bin/phpcs /usr/local/bin/phpcs \
&& docker compose exec application ln -s /var/www/vendor/bin/phpcbf /usr/local/bin/phpcbf
```

To run *PHP Code Sniffer* use command:

```console
docker compose exec application /var/www/vendor/bin/phpcs
```

or, if the shortcut has been created:

```console
docker compose exec application phpcs
```

To update `Composer dependencies` use command (should be done before the command below):

```console
docker compose exec application composer update
```

To login into the *Docker container* use command:

```console
docker exec -it psr-1-example-app /bin/bash
```

**License**

This project is licensed under the GPL-3.0 - see [LICENSE.md](LICENSE.md).

**Official documentation**

[PHP-FIG PRS-12 Official documentation](https://www.php-fig.org/psr/psr-12/)

**What are PSRs**

**PSR** stands for *PHP Standard Recommendation*.
