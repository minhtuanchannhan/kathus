<?php

namespace Rafadiot\Kathus\Traits;

trait MigrationTrait
{
    /**
     * Require (once) all migration files for the supplied module.
     *
     * @param $module
     * @throws \Rafadiot\Kathus\Exceptions\KathusNotFoundException
     */
    protected function requireMigrations($module)
    {
        $path = $this->getMigrationPath($module);

        $migrations = $this->laravel['files']->glob($path . '*_*.php');

        foreach ($migrations as $migration) {
            $this->laravel['files']->requireOnce($migration);
        }
    }

    /**
     * Get migration directory path.
     *
     * @param $module
     * @return string
     * @throws \Rafadiot\Kathus\Exceptions\KathusNotFoundException
     */
    protected function getMigrationPath($module)
    {
        return module_path($module, 'Database/Migrations');
    }
}
