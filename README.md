# Personal Portfolio

## Table of Contents
1. [Goals](#goals)
1. [Requirements](#requirements)
1. [Installation](#installation)
1. [Testing](#testing)
1. [Development Server](#development-server)
1. [Capistrano](#capistrano)
1. [Debugging](#debugging)
1. [Upgrading Wordpress]()
1. [Troubleshooting](#troubleshooting)

## Goals
This WordPress project is intended to provide:
- A consistent local development environment
- Source control using standard Git workflow practices
- Documentation for best practices and standards

## Requirements
- Homebrew (1.2.3)
  - MariaDB (10.0)
  - Wordpress Command Line (1.2.1)
  - Composer (1.4.2)
- Composer (1.4.2)
  - Codeception for Wordpress (Wp-Browser 1.21)
  - Wonolog (1.0.0)
- PHP 7
- Ansible (2.3.1.0) 
- Capistrano (3.9)

***

## Installation
Installation process for the setting up Wordpress on a local environment.

- **Create the MySQL user and databases using the MariaDB monitor**.

      mysql -uroot
      CREATE USER "wordpress"@"localhost" IDENTIFIED BY "[user-selected-password]";

      CREATE DATABASE wordpress_starter;
       GRANT ALL PRIVILEGES ON wordpress_starter.* TO "wordpress"@"localhost";

      CREATE DATABASE wordpress_starter_test;
      GRANT ALL PRIVILEGES ON wordpress_starter_test.* TO "wordpress"@"localhost";

      FLUSH PRIVILEGES;
      EXIT

- **Download Wordpress-Starter Git with WordPress**
Run the following commands

      git clone git@github.com:cbryant24/wordpress-starter.git
      cd wordpress-starter
      cp -v config/database.yml{-dist,}
      cp -v config/secrets.yml{-dist,}
      cp -v wp-security-keys.php{-dist,}

      # Create security key values in wp-security-keys.php
      # See other developers for database config.

- **Initialize Database for Local Server**
Run the following commands  

      cd public
      wp core install --url=http://localhost:9999/ --title=wordpress-starter --admin_user=admin --admin_password=password --admin_email=admin@admin.com

## Development Server

To run the local development server from root:

    rake serve

If running for the first the `wp-config.php` file will be created using the template found in `config/templates/wp-config-development.php.erb`

Site will be accessible at:

- http://localhost:9999

***


## Capistrano

Capistrano will deploy this repo and WordPress to the staging server.

**Run Capistrano** from root folder:

    cap staging deploy

To generate an edited wp-config.php file for the staging and production server.  
_Get `config/database.yml` & `config/secrets.yml` from a WDM team member._

    cap staging wp:setup:generate_remote_files

[Wiki](https://github.com/cbryant24/wordpress_starter/wiki/Capistrano)

***

### WordPress Default Debug

What is actually logged depends on the value of `WP_DEBUG_LOG` constant. When `WP_DEBUG_LOG` is set to true, Wonolog will log everything.

| Command | Description |
| --- | --- |
| `define( 'WP_DEBUG', true );` | Enable WP_DEBUG mode |
| `define( 'WP_DEBUG_LOG', true );` | Enable Debug logging to `/wp-content/debug.log` |
| `define( 'WP_DEBUG_DISPLAY', false );` | Disable display of errors and warnings |
| `@ini_set( 'display_errors', 0 );` | Disable display of errors in the php.ini file  |
| `define( 'SCRIPT_DEBUG', true );` | Uses unminified versions of core JS and CSS files |

