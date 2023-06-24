<?php

namespace App\Console\Commands;

use App\Models\Offer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExpireOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offer:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update Offer status when reaches date_end to false';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $offers = Offer::with('product')->where('end_date', '<=', $now)->get();

        $productIds = [];

        foreach ($offers as $offer) {
            foreach ($offer->product as $product) {
                $productIds[] = $product->id;
            }
            $offer->status = '0';
            $offer->save();
        }

        // Update the products in a single query
        Product::whereIn('id', $productIds)->update(['offer_id' => null]);
        Log::info("all Offers expired successfuly");
    }
}
