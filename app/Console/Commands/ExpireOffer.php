<?php

namespace App\Console\Commands;

use App\Models\Offer;
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
        $offers = Offer::where('end_date', '<=', $now)->get();

        foreach ($offers as $offer) {
            $offer->status = '0';
            $offer->save();
        }

        Log::info("done");
    }
}
