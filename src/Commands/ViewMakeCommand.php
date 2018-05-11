<?php

namespace Jarhen\Modules\Commands;

use Jarhen\Modules\Support\Config\GenerateConfigReader;
use Jarhen\Modules\Support\Stub;
use Jarhen\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class viewMakeCommand extends GeneratorCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'view';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate views for the specified module.';

    /**
     * Get view name.
     *
     * @return string
     */
    public function getDestinationFilePath()
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $viewPath = GenerateConfigReader::read('views');

        return $path . $viewPath->getPath() . '/index.blade.php';
    }

    /**
     * @return string
     */
    protected function getTemplateContents()
    {


        $module = $this->laravel['modules']->findOrFail($this->getModuleName());
        return (new Stub($this->getStubName(), [
            'MODULENAME'        => $module->getStudlyName(),
            'viewNAME'    => $this->getviewName(),
            'NAMESPACE'         => $module->getStudlyName(),
            'CLASS_NAMESPACE'   => $this->getClassNamespace($module),
            'CLASS'             => $this->getviewName(),
            'LOWER_NAME'        => $module->getLowerName(),
            'MODULE'            => $this->getModuleName(),
            'NAME'              => $this->getModuleName(),
            'STUDLY_NAME'       => $module->getStudlyName(),
            'MODULE_NAMESPACE'  => $this->laravel['modules']->config('namespace'),
			'SETTABLEHEADER'  	=> $this->settableheader(),
        ]))->render();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
	protected function settableheader(){
	$module = $this->laravel['modules']->findOrFail($this->getModuleName());
	$options 	=  $this->option('settableheader');
		$string ="";
		$count = 0;
		foreach ($options as $key) {
			if($count <5)
			{ 
				$class = 'all';
			}
			else
			{
				if($key == 'Action'){
					$class = 'all';
				}
				else
				{
					$class = 'none';
				}
				
			}
			$string .= "<th class=\"".$class."\">".ucfirst($key)."</th>\n\t\t\t\t\t\t";
			$count++;
		}
		return $string;

	}
	
    protected function getArguments()
    {
        return [
            ['view', InputArgument::REQUIRED, 'The name of the view class.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
			
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['plain', 'p', InputOption::VALUE_NONE, 'Generate a plain view', null],
			['settableheader', null, InputOption::VALUE_OPTIONAL, ' Generate datatable script.', null],
			
        ];
    }

    /**
     * @return array|string
     */
    protected function getviewName()
    {
        $view = studly_case($this->argument('view'));

        if (str_contains(strtolower($view), 'view') === false) {
            $view .= 'view';
        }

        return $view;
    }

    public function getDefaultNamespace() : string
    {
        return $this->laravel['modules']->config('paths.generator.view.path', 'Http/views');
    }

    /**
     * Get the stub file name based on the plain option
     * @return string
     */
    private function getStubName()
    {
        if ($this->option('plain') === true) {
            return '/index-plain.stub';
        }

        return '/index.stub';
    }
}
