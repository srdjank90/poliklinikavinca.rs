<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetCurrentGoldPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:current';

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
        $json = file_get_contents('https://data-asg.goldprice.org/dbXRates/EUR');
        $decoded = json_decode($json);
        $item = $decoded->items;
        $date = $decoded->date;
        $goldPrice = $item[0]->xauPrice;
        $goldPrice = number_format($goldPrice, 3, '.', ',');
        updateOption('current_gold_price_opt', $goldPrice);
    }
}
