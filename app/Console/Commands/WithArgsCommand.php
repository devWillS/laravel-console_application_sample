<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WithArgsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'with-args-command {name} {--switch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $switch = $this->option('switch');

        $this->comment('Hello ' . $name . ' ' . ($switch ? 'ON' : 'OFF'));
        return 0;
    }
}
