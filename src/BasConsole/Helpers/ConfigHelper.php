<?php 
namespace BasConsole\Helpers;

class ConfigHelper 
{
    private $workingDir;

    private $configPath;

    public function __construct() {
        $this->workingDir = getcwd();
    }

    public function getConfig($path = null, $moduleName = null) {
        return $this->checkIfDirectoryIsActive($path, $moduleName);
    }

    public function getConfigPath() {
        // Returning this for now but needs to check if set then return if not then run a setter on the path
        return $this->configPath;
    }

    protected function setConfigPath($path) {
        $this->configPath = $path;    
    }

    protected function checkIfDirectoryIsActive($path, $moduleName) {
        if(null == $path) {
            if(null !== $moduleName) {
                if(is_file($this->workingDir . "/module/{$moduleName}/config/module.config.php")) {
                    $configPath = $this->workingDir . "/module/{$moduleName}/config/module.config.php"; 
                    $this->setConfigPath($configPath);
                    return include $configPath; 
                } else {
                    throw new \Exception("Could not find 'module.config.php' for Module {$moduleName}. Supply --path='/path/to/project/root'.");
                }
            }        
        } else if(null !== $path) {
            if(null !== $moduleName) {
                if(is_file($path . "/module/{$moduleName}/config/module.config.php")) {
                    $configPath = $path . "/module/{$moduleName}/config/module.config.php"; 
                    $this->setConfigPath($configPath);
                    return include $configPath; 
                } else {
                    throw new \Exception("Could not find 'module.config.php' for Module {$moduleName}. Supply --path='path/to/project/root'.");
                }          
            }
        }   
    }

    public function recursiveGlob($path, $pattern = '*', $flag = 0) {
        
        $paths = glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
        $files = glob($path.$pattern, $flag);

        foreach($paths as $path) {
            $files = array_merge($files, $this->recursiveGlob($path, $pattern, $flag));
        }

        return $files;
    }
        
}
