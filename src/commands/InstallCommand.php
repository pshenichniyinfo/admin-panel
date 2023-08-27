<?php

namespace Pshenichniyinfo\AdminPanel\commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Pshenichniyinfo\AdminPanel\database\Seeder;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class InstallCommand extends Command implements Isolatable
{
    protected $signature = 'admin-panel:install';

    protected $description = 'Send a marketing email to a user';

    public function handle(): void
    {
        $email = text('Enter your email address', required: true);
        $password = password(
            'Enter your password',
            required: true,
            validate: fn (string $value) => match (true) {
                strlen($value) < 8 => 'The password must be at least 8 characters.',
                default => null
            }
        );

        Seeder::addSuperAdmin($email, $password);

        info('Package installed successfully.');
    }
}
