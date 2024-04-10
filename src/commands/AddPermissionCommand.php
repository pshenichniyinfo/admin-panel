<?php

namespace Pshenichniyinfo\AdminPanel\commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Pshenichniyinfo\AdminPanel\database\Seeder;

class AddPermissionCommand extends Command implements Isolatable
{
    protected $signature = 'admin-panel:add-permission';

    protected $description = 'Add new permission';

    public function handle(): void
    {
        Seeder::addPermissions();

        info('Added permissions successfully.');
    }
}
