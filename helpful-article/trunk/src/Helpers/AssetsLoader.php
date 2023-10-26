<?php 

namespace HelpfulArticle\Helpers;

use HelpfulArticle\Traits\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class AssetsLoader
{
    use SingletonTrait;

    private function __construct()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'loadAssets'  ] );  
    }

    public function loadAssets()
    {
        wp_register_script(
            'ha-main',
            HA_PLUGIN_URL . 'assets/js/main.js',
            [],
            HA_VERSION,
            true
        );

        wp_localize_script( 'ha-main', 'ha-data', [
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        ] );

        wp_enqueue_script( 'ha-main' );

        wp_enqueue_style( 'ha-style', HA_PLUGIN_URL . 'assets/css/main.css' );
    }
}