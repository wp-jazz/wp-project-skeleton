# Jazz — A Modern WordPress Site Skeleton

Use this boilerplate to quickly set up and start working on a new WordPress website with a modern project structure.

_This boilerplate is based on [roots/bedrock](https://github.com/roots/bedrock)._

## Features

- Better folder structure
- Dependency management with [Composer](https://getcomposer.org)
- Easy WordPress configuration with environment specific files
- Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
- Autoloader for mu-plugins (use regular plugins as mu-plugins)
- Enhanced security (separated web root and secure passwords with [wp-password-bcrypt](https://github.com/roots/wp-password-bcrypt))

## Assumptions

* WordPress, as a Composer dependency, installed in `/public/wordpress`
* Simplified content directory, outside of WordPress:
  * `/public/plugins`
  * `/public/mu-plugins`
  * `/public/themes`
  * `/public/uploads`
* Custom namespaced constants for the project structure:
  * `Jazz\APP_PUBLIC_PATH` — Path to the public web directory.
  * `Jazz\APP_BASE_PATH` — Path to the project directory.
  * `Jazz\APP_CONFIG_PATH` — Path to the project configuration directory.
  * `Jazz\APP_VENDOR_PATH` — Path to the Composer dependencies directory.

## Requirements

- PHP >= 7.1
- Composer ([Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))

## Installation

1.  Create a new project:

    ```shell
    composer create-project mcaskill/wp-jazz
    ```

2.  Update environment variables in the `.env` file.

    Wrap values that may contain non-alphanumeric characters with quotes, or they may be incorrectly parsed.

    - Database variables:
      - `DB_NAME` - Database name
      - `DB_USER` - Database user
      - `DB_PASSWORD` - Database password
      - `DB_HOST` - Database host
      - Optionally, you can define `DATABASE_URL` for using a DSN instead of using the variables above:

        ```shell
        DATABASE_URL="mysql://user:password@127.0.0.1:3306/db_name"
        ```

    - `WP_ENV` - Set to environment (`development`, `staging`, `production`)
    - `WP_HOME` - Full URL to WordPress home (https://example.com)
    - `WP_SITEURL` - Full URL to WordPress including subdirectory (https://example.com/wordpress)
    - `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
      - Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)
      - Generate with [our WordPress salts generator](https://roots.io/salts.html)
3. Add plugin(s) in `public/plugins` and theme(s) in `public/themes` as you would for a normal WordPress site
4. Set the document root on your webserver to Jazz's `public` folder: `/path/to/site/public/`
5. Access WordPress admin at `https://example.com/wordpress/wp-admin/`

## Documentation

<!-- Jazz documentation is available at the repository's [GitHub Wiki](https://github.com/mcaskill/wp-jazz/wiki). -->

### Directory Structure

```
├── composer.json             # → Manage versions of WordPress, plugins & dependencies
├── config/                   # → WordPress configuration files
│   ├── environments/         # → Environment specific configs
│   │   ├── development.php   # → Development config
│   │   └── staging.php       # → Staging config
│   ├── application.php       # → Primary project config file (wp-config.php equivalent)
│   ├── bootstrap.php         # → Bootstrap config files
│   └── wordpress.php         # → Primary WordPress config file (wp-config.php equivalent)
├── public/                   # → Web root and equivalent of wp-content
│   ├── mu-plugins/           # → Must-use plugins
│   ├── plugins/              # → Plugins
│   ├── themes/               # → Themes
│   ├── uploads/              # → Uploads
│   ├── wordpress/            # → WordPress core (never edit)
│   ├── index.php             # → WordPress bootstrapper
│   └── wp-config.php         # → Required by WordPress (never edit)
└── vendor/                   # → Composer packages (never edit)
```

The organization of Jazz is similar to putting WordPress in [its own subdirectory](https://wordpress.org/support/article/giving-wordpress-its-own-directory/) but with some improvements:

- In order not to expose sensitive files in the web root, Jazz moves what's required into a `public/` directory including the `wordpress/` source, and the `wp-content/` source.
- `wp-content` itself is ignored as an unnecessary subdirectory.
- `wp-config.php` remains in the `public/` because it's required by WordPress, but it only acts as a loader. The actual configuration files have been moved to `config/` for better separation.
- `vendor/` is where the Composer managed dependencies are installed to.
- `wordpress/` is where WordPress core lives. It's managed by Composer but can't be put under `vendor` due to WordPress limitations.

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/mcaskill/wp-jazz/blob/master/CONTRIBUTING.md) to help you get started.

## Acknowledgements

This boilerplate is based on the solid work of many that have come before me, including:

- [Assely](https://github.com/assely)
- [roots/bedrock](https://github.com/roots/bedrock)
- [Dioscuri](https://github.com/pryley/dioscuri)
- [felixarntz/wp-composer-stack](https://github.com/felixarntz/wp-composer-stack)
- [markjaquith/wordpress-skeleton](https://github.com/markjaquith/WordPress-Skeleton)
- [mrgrain/autobahn](https://github.com/mrgrain/autobahn)
- [Themosis](https://framework.themosis.com)
- [WordPlate](https://github.com/wordplate)
