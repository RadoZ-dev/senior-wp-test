<?php 

namespace HelpfulArticle;

use HelpfulArticle\Traits\SingletonTrait;
use HelpfulArticle\Helpers\AssetsLoader;
use HelpfulArticle\Controllers\Render;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class HelpfulArticleInit
{
    use SingletonTrait;

    private function __construct()
    {
        $this->init();        
    }

    public function init()
    {
        Render::getInstance();
        AssetsLoader::getInstance();
    }
}
