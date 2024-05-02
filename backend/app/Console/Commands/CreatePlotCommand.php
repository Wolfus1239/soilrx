<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreatePlotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plot:create';

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
        $plot=new \App\Models\Plot();
        $plot->name=$this->ask('Введи имя');
        $plot->size=$this->ask('Введи размер');
        $plot->save();
        $this->info('Участок создана');
    }
}
