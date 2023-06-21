<?php

namespace App\Console\Commands;

use App\Events\OrderNotificationEvent;
use App\Events\OutOfStockEvent;
use App\Events\OutOfStockProducts;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class OutOfStockProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:out-of-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get out of stock products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $outOfStockCount = 0;
        $products  = Product::all();

        foreach($products as $product)
        {
            $product->quantity < 1 ? $outOfStockCount++ : 0;
        }
        if($outOfStockCount)
        {
            event(new OutOfStockEvent(
                $outOfStockCount,
                'http://127.0.0.1:8000/dashboard/products/out-of-stock',
                Carbon::now(),
            ));
            Log::info('Out Of Stock sent Successfully');
        }
    }
}
