<?php

namespace Jarhen\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Jarhen\Modules\Commands\CommandCommand;
use Jarhen\Modules\Commands\ControllerCommand;
use Jarhen\Modules\Commands\DisableCommand;
use Jarhen\Modules\Commands\DumpCommand;
use Jarhen\Modules\Commands\EnableCommand;
use Jarhen\Modules\Commands\GenerateEventCommand;
use Jarhen\Modules\Commands\GenerateJobCommand;
use Jarhen\Modules\Commands\GenerateListenerCommand;
use Jarhen\Modules\Commands\GenerateMailCommand;
use Jarhen\Modules\Commands\GenerateMiddlewareCommand;
use Jarhen\Modules\Commands\GenerateNotificationCommand;
use Jarhen\Modules\Commands\GenerateProviderCommand;
use Jarhen\Modules\Commands\GenerateRouteProviderCommand;
use Jarhen\Modules\Commands\InstallCommand;
use Jarhen\Modules\Commands\ListCommand;
use Jarhen\Modules\Commands\MakeCommand;
use Jarhen\Modules\Commands\MakeRequestCommand;
use Jarhen\Modules\Commands\MigrateCommand;
use Jarhen\Modules\Commands\MigrateRefreshCommand;
use Jarhen\Modules\Commands\MigrateResetCommand;
use Jarhen\Modules\Commands\MigrateRollbackCommand;
use Jarhen\Modules\Commands\MigrationCommand;
use Jarhen\Modules\Commands\ModelCommand;
use Jarhen\Modules\Commands\PublishCommand;
use Jarhen\Modules\Commands\PublishConfigurationCommand;
use Jarhen\Modules\Commands\PublishMigrationCommand;
use Jarhen\Modules\Commands\PublishTranslationCommand;
use Jarhen\Modules\Commands\SeedCommand;
use Jarhen\Modules\Commands\SeedMakeCommand;
use Jarhen\Modules\Commands\SetupCommand;
use Jarhen\Modules\Commands\UpdateCommand;
use Jarhen\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        MakeCommand::class,
        CommandCommand::class,
        ControllerCommand::class,
        DisableCommand::class,
        EnableCommand::class,
        GenerateEventCommand::class,
        GenerateListenerCommand::class,
        GenerateMiddlewareCommand::class,
        GenerateProviderCommand::class,
        GenerateRouteProviderCommand::class,
        InstallCommand::class,
        ListCommand::class,
        MigrateCommand::class,
        MigrateRefreshCommand::class,
        MigrateResetCommand::class,
        MigrateRollbackCommand::class,
        MigrationCommand::class,
        ModelCommand::class,
        PublishCommand::class,
        PublishMigrationCommand::class,
        PublishTranslationCommand::class,
        SeedCommand::class,
        SeedMakeCommand::class,
        SetupCommand::class,
        UpdateCommand::class,
        UseCommand::class,
        DumpCommand::class,
        MakeRequestCommand::class,
        PublishConfigurationCommand::class,
        GenerateJobCommand::class,
        GenerateMailCommand::class,
        GenerateNotificationCommand::class,
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = $this->commands;

        return $provides;
    }
}
