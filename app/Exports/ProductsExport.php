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
            '#',
            'اسم المنتج',
            'وصف المنتج',
            'سعر المنتج',
            'حالة المنتج',
            'كمية المنتج',
            'فئة المنتج'
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
            $invoice->id,
            $invoice->name,
            $invoice->desc,
            $invoice->price,
            $invoice->status ? 'مفعل' : 'غير مفعل',
            $invoice->quantity ?? 0,
            $invoice->category->name,
        ];
    }
}
