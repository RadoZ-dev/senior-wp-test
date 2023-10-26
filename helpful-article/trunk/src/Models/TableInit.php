<?php 

namespace HelpfulArticle\Models;

use HelpfulArticle\Traits\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class TableInit
{
    use SingletonTrait;

    public static function createTable()
    {   
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $tableName = $wpdb->prefix . HA_SLUG;

        $sql = "CREATE $tableName (
            time datetime '0000-00-00 00:00:00' NOT NULL,
            post_id bigint(20) UNSIGNED DEFAULT NULL,
            value tinyint(1) UNSIGNED DEFAULT NULL,
            ip_address text NOT NULL DEFAULT ''
        ) $charsetCollate";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $sql );
    }
}
