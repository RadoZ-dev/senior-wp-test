<?php 

namespace HelpfulArticle\Helpers;

use HelpfulArticle\Traits\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class Twig
{
    use SingletonTrait;

    public $twig;

    private function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader( HA_PLUGIN_DIR . 'src/Views' );
        $this->twig = new \Twig\Environment( $loader, [] );
    }
}