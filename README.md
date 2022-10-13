# 🎷 Jazz — A modern WordPress boilerplate

Yet another modern WordPress boilerplate with Composer, an easier configuration,
and an improved folder structure.

> This boilerplate is based on [Bedrock][roots/bedrock].
>
> If you have the capability, please consider [sponsoring Roots](https://github.com/sponsors/roots).

## Overview

This boilerplate assumes you are familiar with [Bedrock](https://docs.roots.io/bedrock/master/installation/).

Differences with Bedrock:

* The _Web root directory_ is `public` instead of `web`.
* The _WordPress core directory_ is `wordpress` instead of `wp`.
* The _WordPress content directory_ is the same path as the Web root.
  * In vanilla WordPress, this is the `/wp-content` directory.
  * In Bedrock, this is the `/web/app` directory.
  * Simplified folder structure in Jazz:
    * `/public/plugins`
    * `/public/mu-plugins`
    * `/public/themes`
    * `/public/uploads`
    * `/public/wordpress`
* The _primary configuration file_ in Bedrock (`/config/application.php`)
  is split across multiple files:
  * `/config/bootstrap.php` — Bootstraps the environment variables, WordPress
    environment type, and configuration files.
  * `/config/application.php` — Production configuration for your WordPress application.
  * `/config/wordpress.php` — Base configuration for WordPress (equivalent of `wp-config.php`).
* Roots' `WP_ENV` constant is superseded by WordPress' `WP_ENVIRONMENT_TYPE` constant.
  * The former is still defined because its required by dependencies and plugins by Roots.
* Jazz namespaced constants for the project structure:
  * `Jazz\APP_PUBLIC_PATH` — Path to the public web directory.
  * `Jazz\APP_BASE_PATH` — Path to the project directory.
  * `Jazz\APP_CONFIG_PATH` — Path to the project configuration directory.
  * `Jazz\APP_VENDOR_PATH` — Path to the Composer dependencies directory.
  * `Jazz\WP_BASE_DIRNAME` — Name of to the WordPress core directory.
  * `Jazz\WP_BASE_PATH` — Absolute path to the WordPress core directory
    (without a trailing slash).

## Requirements

* PHP >= 7.4
* Composer ([Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))

## Installation

1. Create a new project:

    ```shell
    composer create-project wp-jazz/wp-project-skeleton
    ```

2. Update environment variables in the `.env` file.

    Wrap values that may contain non-alphanumeric characters with quotes,
    or they may be incorrectly parsed.

    * Database variables:
      * `DB_NAME` — Database name
      * `DB_USER` — Database user
      * `DB_PASSWORD` — Database password
      * `DB_HOST` — Database host
      * Optionally, you can define `DATABASE_URL` for using a DSN instead
        of using the variables above:

        ```shell
        DATABASE_URL="mysql://user:password@127.0.0.1:3306/db_name"
        ```

    * `WP_ENVIRONMENT_TYPE` — Set to environment (`development`, `staging`, `production`)
    * `WP_HOME` — Full URL to WordPress home (https://example.com)
    * `WP_SITEURL` — Full URL to WordPress including subdirectory (https://example.com/wordpress)
    * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
      * Generate with [wp-cli-dotenv-command]
      * Generate with [our WordPress salts generator][roots/salts]
3. Add plugin(s) in `public/plugins` and `public/mu-plugins`, and theme(s) in `public/themes` either:
    * as you would for a normal WordPress site (add an exception to the `.gitignore` if you want to index them)
    * or as Composer dependencies.
4. Set the document root on your Web server to Jazz's `public` folder: `/path/to/site/public/`.
5. Access WordPress admin at `https://example.com/wordpress/wp-admin/`.

<!-- ## Documentation -->

<!-- Jazz documentation is available at the repository's [GitHub Wiki](https://github.com/wp-jazz/wp-project-skeleton/wiki). -->

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](CONTRIBUTING.md) to help you get started.

## Acknowledgements

This boilerplate is based on the solid work of many that have come before me, including:

* [Assely][assely]
* [Bedrock][roots/bedrock]
* [Dioscuri][dioscuri]
* [felixarntz/wp-composer-stack]
* [markjaquith/wordpress-skeleton]
* [mrgrain/autobahn]
* [Themosis][themosis]
* [WordPlate][wordplate]

[altis]:                          https://www.altis-dxp.com
[assely]:                         https://github.com/assely
[composer]:                       https://getcomposer.org
[dioscuri]:                       https://github.com/pryley/dioscuri
[felixarntz/wp-composer-stack]:   https://github.com/felixarntz/wp-composer-stack
[markjaquith/wordpress-skeleton]: https://github.com/markjaquith/WordPress-Skeleton
[mrgrain/autobahn]:               https://github.com/mrgrain/autobahn
[roots/bedrock]:                  https://github.com/roots/bedrock
[roots/salts]:                    https://roots.io/salts.html
[roots/wp-password-bcrypt]:       https://github.com/roots/wp-password-bcrypt
[themosis]:                       https://framework.themosis.com
[vlucas/phpdotenv]:               https://github.com/vlucas/phpdotenv
[wordplate]:                      https://github.com/wordplate
[wp-cli-dotenv-command]:          https://github.com/aaemnnosttv/wp-cli-dotenv-command
