<?php 
namespace BasConsole\Factories;

use Zend\ServiceManager\ServiceManager,
    Zend\Config\Config,
    Zend\Config\Writer;

class ConfigFactory 
{
    protected $_sm;
	
    public function __construct() {
    
    }

    public function getConfigObject(array $array = array(), $true = true) {
        return new Config($array, $true);
    }

    public function getPhpWriter() {
        return  new Writer\PhpArray();

    }

}

