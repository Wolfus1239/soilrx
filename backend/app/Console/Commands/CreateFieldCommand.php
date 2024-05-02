<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateFieldCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:field';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new field';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $field=new \App\Models\Field();
        $field->name=$this->ask('Введи имя');
        $field->cadastre_number=$this->ask('Введи кадастровый номер');
        $field->size=$this->ask('Введи размер');
        $field->user_id=1;
        $field->save();
        $this->info('Поле создано');
    }
}
