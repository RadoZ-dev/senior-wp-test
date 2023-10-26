<?php 

namespace HelpfulArticle\Controllers;

use HelpfulArticle\Traits\SingletonTrait;
use HelpfulArticle\Helpers\Twig;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class Render
{
    use SingletonTrait;

    private function __construct()
    {
        add_filter( 'the_content', [ $this, 'renderTemplate' ] );
    }

    public function renderTemplate( $content ) 
    {   
        $formContent = [
            'question' => __( 'Was this article helpful?', HA_SLUG ),
            'confirmMessage' => __( 'Thank you for your feedback!', HA_SLUG ),
            'yes' => __( 'Yes', HA_SLUG ),
            'no' => __( 'No', HA_SLUG ),
            'smile' => HA_PLUGIN_URL . 'assets/img/smile.svg',
            'sad' => HA_PLUGIN_URL . 'assets/img/sad.svg',
            'voted' => ''
        ];

        if ( is_single() )
        {  
            $template = Twig::getInstance()->twig->load( 'form.twig' );
            $content .= $template->render( $formContent );
        }
        
        return $content;
    }
}