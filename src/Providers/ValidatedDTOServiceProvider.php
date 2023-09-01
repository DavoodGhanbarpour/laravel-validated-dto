<?php

declare(strict_types=1);

namespace WendellAdriel\ValidatedDTO\Providers;

use Illuminate\Support\ServiceProvider;
use WendellAdriel\ValidatedDTO\Console\Commands\MakeDTOCommand;

final class ValidatedDTOServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands(MakeDTOCommand::class);
        }

        $this->publishes(
            [
                __DIR__ . '/../../config/dto.php' => base_path('config/dto.php'),
            ],
            'config'
        );
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/dto.php', 'dto');
    }
}
