<?php
/*
Plugin Name: HelpfulArticle
Description: Wordpress plugin that integrates a simple voting system with Wordpress articles.
Version: 1.0.0
Author: Radoslav Zdravkovic
Text Domain: helpful-article
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

require 'vendor/autoload.php';

use HelpfulArticle\HelpfulArticleInit;
use HelpfulArticle\Models\TableInit;

define( "HA_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );
define( "HA_PLUGIN_URL", plugin_dir_url( __FILE__ ) );
define( "HA_VERSION", '1.0.0' );
define( "HA_SLUG", 'helpful-article' );

add_action( 'plugins_loaded', function() {
    HelpfulArticleInit::getInstance();
} );

load_plugin_textdomain( HA_SLUG, false, basename( dirname( __FILE__ ) ) . '/languages' );
