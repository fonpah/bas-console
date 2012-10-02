<?php 
namespace BasConsole\Commands;

use Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console\Output\OutputInterface,
    BAS\zf2\Helpers\ConfigHelper;

class RouteCommand extends Command 
{
    protected $config; 

    protected function configure()
    {
        //$this->config = new ConfigHelper();
        
        $this->setName('route:add')->setDescription($this->getDescript())
             ->addArgument('{RouteName}', InputArgument::REQUIRED, 'Choose a name for this route.')
             ->addOption('type', null, InputOption::VALUE_REQUIRED, 'Choose a Route Type!', 'Segment');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

    }

    protected function getDescript() {
        return 'Add a Route to your Project (Segment Default -(Routes are case - insensitive)';

    }

    protected function setWorkingDir($wd = null) {
        if(null != $wd) {
            $this->wd = $wd;
        }
        return $this->wd;
    }


}