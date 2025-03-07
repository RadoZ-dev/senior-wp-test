<?php 

namespace HelpfulArticle\Traits;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

trait SingletonTrait
{
    private static $instance;

    /**
     * @return $this
     */
    public static function getInstance()
    {
        if ( ! ( self::$instance instanceof self ) ) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}
