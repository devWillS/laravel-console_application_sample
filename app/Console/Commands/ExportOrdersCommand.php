<?php

namespace App\Console\Commands;

use App\UseCases\ExportOrdersUseCase;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;

class ExportOrdersCommand extends Command
{
    private $useCase;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-orders {date} {--output=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '購入情報を出力する';

    public function __construct(ExportOrdersUseCase $useCase)
    {
        parent::__construct();

        $this->useCase = $useCase;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->argument('date');
        $targetDate = CarbonImmutable::createFromFormat('Ymd', $date);

        $tsv = $this->useCase->run($targetDate);

        $outputFilePath = $this->option('output');

        if (is_null($outputFilePath)) {
            echo $tsv, PHP_EOL;
            return 0;
        }

        file_put_contents($outputFilePath, $tsv);

        return 0;
    }
}
