<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("amr@akeissa.com", config('app.name')),
            subject: $this->subject,
        );
    }

    public function build()
    {
        $dataDecode = json_decode($this->data, true);
        // Get Products
        $products = [];
        foreach ($dataDecode['menu'] as $productId) {
            $productInfo = Product::where('id', $productId)->first();
            $products[] = $productInfo;
        }
        
        return $this->subject('Order Confirmation')
            ->view('mail.order')
            ->with([
                'data' => $dataDecode,
                'products' => $products
            ]);
    }
}
