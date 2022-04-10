<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UseCases\SendOrdersUseCase;
use Carbon\CarbonImmutable;
use Psr\Log\LoggerInterface;

class SendOrdersCommand extends Command
{
    private $useCase;

    /** @var LoggerInterface */
    private $logger;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-orders {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(SendOrdersUseCase $useCase, LoggerInterface $logger)
    {
        parent::__construct();

        $this->useCase = $useCase;
        $this->logger = $logger;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->logger->info(__METHOD__ . ' ' . 'start');

        $date = $this->argument('date');
        $targetDate = CarbonImmutable::createFromFormat('Ymd', $date);

        $this->logger->info('TargetDate:' . $date);

        $count = $this->useCase->run($targetDate);

        $this->logger->info(__METHOD__ . ' ' . 'done sent_count:' . $count);

        return 0;
    }
}
