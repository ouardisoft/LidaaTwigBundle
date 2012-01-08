<?php

namespace Lidaa\TwigBundle\Twig;

class PhpExtension extends \Twig_Extension {

    public function getFunctions() {
        $fonctions = array();
        
        $fonctions['php_*'] = new \Twig_Function_Method($this, 'twig_to_php', array('pre_escape' => 'html', 'is_safe' => array('html')));
        
        return $fonctions;
    }

    public function twig_to_php() {
 
       $arg_list = func_get_args();
       $function = array_shift($arg_list);
       
       return call_user_func_array($function, $arg_list);
      
    }
        
    
    public function getName() {
        return 'php';
    }

}