<?php

namespace Jarhen\Modules\Commands;

use Jarhen\Modules\Support\Config\GenerateConfigReader;
use Jarhen\Modules\Support\Stub;
use Jarhen\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class EditMakeCommand extends GeneratorCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'edit';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make-edit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate edit form for the specified module.';

    /**
     * Get view name.
     *
     * @return string
     */
    public function getDestinationFilePath()
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $viewPath = GenerateConfigReader::read('views');

        return $path . $viewPath->getPath() . '/edit.blade.php';
    }

    /**
     * @return string
     */
    protected function getTemplateContents()
    {


        $module = $this->laravel['modules']->findOrFail($this->getModuleName());
        return (new Stub($this->getStubName(), [
            'MODULENAME'        => $module->getStudlyName(),
            'viewNAME'    		=> $this->getviewName(),
            'NAMESPACE'         => $module->getStudlyName(),
            'CLASS_NAMESPACE'   => $this->getClassNamespace($module),
            'CLASS'             => $this->getviewName(),
            'LOWER_NAME'        => $module->getLowerName(),
            'MODULE'            => $this->getModuleName(),
            'NAME'              => $this->getModuleName(),
            'STUDLY_NAME'       => $module->getStudlyName(),
			'IDNAME'			=>rtrim($module->getLowerName(),'s')."_id",
			'SINGULARNAME'		=>rtrim($module->getLowerName(),'s'),
            'MODULE_NAMESPACE'  => $this->laravel['modules']->config('namespace'),
        ]))->render();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
	
	
    protected function getArguments()
    {
        return [
            ['edit', InputArgument::REQUIRED, 'The name of the form class.'],
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
			['setform', null, InputOption::VALUE_OPTIONAL, ' Generate html forms.', null],
			
        ];
    }

    /**
     * @return array|string
     */
    protected function getviewName()
    {
        $view = studly_case($this->argument('edit'));

        if (str_contains(strtolower($view), 'edit') === false) {
            $view .= 'edit';
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
            return '/edit-plain.stub';
        }

        return '/edit.stub';
    }
}
