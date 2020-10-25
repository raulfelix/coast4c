[Coast4C](http://www.coast4c.com) 
======
##### BAW Post View Count settings #####

* Set the **Count format:**  `%count%`
* Deselect posts and check **featured/news** for count tracking

## Navigation structure ##
1. Create pages to match primary nav elements
2. Create categories to tag by
3. Add the `Add to homepage carousel` category under **carousel**

## Site Settings ##
##### Site Address #####
1. Go to `Settings > General`
2. Set the `Site address` field to a root URL removing the `/wordpress`

##### Site home page #####
1. Go to `Settings > Reading`
2. Set a static front page to the `home` template

##### Site pretty permalinks #####
1. Go to `Settings > Permalinks`
2. Set permalinks to `postname`

##### Site/Server settings #####
At the server root level e.g. public_html folder create a **.htaccess** file with the following:

```
# BEGIN WordPress

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>

# END WordPress
```

At the server root level e.g. public_html folder create an **index.php** file with the following:


```
#!php

<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wordpress/wp-blog-header.php' );

```