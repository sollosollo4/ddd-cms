<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin model for authorization';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = new \App\Models\User();
        $user->name = 'admin';
        $user->password = \Illuminate\Support\Facades\Hash::make("panel");
        $user->email = 'admin@panel.com';
        $user->save();

        return Command::SUCCESS;
    }
}
