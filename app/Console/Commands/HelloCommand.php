<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'hello:class {name}';
    protected $signature = 'hello:class {--switch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンド（クラス）';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        // $this->comment('Hello class command');

        // $name = $this->argument('name');
        // $this->comment('Hello ' . $name);

        $switch = $this->option('switch');
        $this->comment('Hello ' . ($switch ? 'ON' : 'OFF'));
        return 0;
    }
}
