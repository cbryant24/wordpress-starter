<?php

######### IMPORTANT #########
#
# This version of the file is used only in development/testing. 
#
# Make sure to change '/config/templates/wp-config.php.erb' for staging/production
#
#############################


#############################
# Environment
#############################
if ( !defined('WP_ENV') ) define('WP_ENV', 'development');

if (WP_ENV == 'phpunit' || WP_ENV == 'test') {
	define('WP_DEBUG', false); // Debug mode must always be disabled for testing
} else {
	define('WP_DEBUG', false);
}


#############################
# Database Configuration
#############################
$table_prefix  = 'wp_';

if (WP_ENV == 'phpunit' || WP_ENV == 'test') {

	define('DB_NAME', 'database_name');
	define('DB_USER', 'user_name');
	define('DB_PASSWORD', 'publicpassword');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');

} else {

	define('DB_NAME', 'wordpress_starter');
	define('DB_USER', 'wordpress');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');

}

#############################
# Automated Testing
#############################
if (WP_ENV == 'phpunit') {
	define( 'WP_TESTS_DOMAIN', 'localhost:9998' );
	define( 'WP_TESTS_EMAIL', '' );
	define( 'WP_TESTS_TITLE', '' );
	define( 'WP_PHP_BINARY', 'php' );
}

#############################
# Localization Settings
#############################
define('WPLANG', '');


#############################
# Security
#############################
define('DISALLOW_FILE_EDIT', true); // File edits must only occur via SCM (git)
define('DISALLOW_FILE_MODS', true); // File edits must only occur via SCM (git)


#############################
# Security Keys (Salt)
#############################
require('/Users/cbryant/Desktop/webdev/wordpress_starter/wp-security-keys.php');


#############################
# PATHS AND URLS
#############################
if (WP_ENV == 'phpunit' || WP_ENV == 'test') {
	define('DOMAIN_CURRENT_SITE', 'localhost:9998');
} else {
	define('DOMAIN_CURRENT_SITE', 'localhost:9999');
}

define('WP_HOME','http://'.DOMAIN_CURRENT_SITE);
define('WP_SITEURL','http://'.DOMAIN_CURRENT_SITE);

// wp-content paths
define('WP_CONTENT_URL', 'http://'.DOMAIN_CURRENT_SITE.'/wp-content');
define('WP_CONTENT_DIR', realpath('/Users/cbryant/Desktop/webdev/wordpress_starter/content'));

// Nginx cache path for nginx-helper
define('RT_WP_NGINX_HELPER_CACHE_PATH', '/var/cache/nginx/wordpress/');

// Absolute path to the WP directory
if ( !defined('ABSPATH') ) define('ABSPATH', '/Users/cbryant/Desktop/webdev/wordpress_starter/public/');


#############################
# Authentication Keys
#############################
class wp_starter_keychain {
	private $hash = 'd554c68aa02990597ffc2d68f445a6fa';
	private $keys = array(
		'email_username' => 'bryant.development.services@gmail.com',
		'email_password' => '',

		'roleservice_api_url'  => '',
		'roleservice_username' => '',
		'roleservice_password' => '',
	);

	public function __construct($passphrase) {
		if (md5($passphrase) != $this->hash) unset($this->keys);
	}

	public function get($name) {
		return ($this->keys && array_key_exists($name, $this->keys)) ? $this->keys[$name] : md5(time());
	}
}

#############################
# Includes
#############################
if (WP_ENV != 'phpunit') {
	require_once(ABSPATH . 'wp-settings.php');
}

