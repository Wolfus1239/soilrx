<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateSoilCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:soil';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new soil type';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $soil=new \App\Models\Soil_type();
        $soil->name=$this->ask('Введи имя');
        $soil->save();
        $this->info('Тип почвы создан');
    }
}
