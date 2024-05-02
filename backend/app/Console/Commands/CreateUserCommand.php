<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user=new \App\Models\User();
        $user->name=$this->ask('Введи имя');
        $user->email=$this->ask('Введи электронку');;
        $user->password=bcrypt($this->secret('Введи пароль'));
        $user->save();
        $this->info('Пользователь создан');

    }
}
