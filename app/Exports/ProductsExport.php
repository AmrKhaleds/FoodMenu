<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Headings
     */
    public function headings(): array
    {
        return [
            'product_name',
            'product_description',
            'product_price',
            'product_status',
            'product_quantity',
            'product_category'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::with('category')->select('id', 'name', 'desc', 'price', 'quantity', 'status', 'category_id')->get();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($invoice): array
    {
        return [
            $invoice->name,
            $invoice->desc,
            $invoice->price,
            $invoice->status ? 'مفعل' : 'غير مفعل',
            $invoice->quantity ?? 0,
            $invoice->category_id,
        ];
    }
}
