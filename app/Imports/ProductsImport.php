<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row );
        // foreach($row as $)
        return new Product([
            'name' => $row['product_category'],
            'desc' => $row['product_description'],
            'price' => $row['product_price'],
            'status' => $row['product_status'],
            'quantity' => $row['product_quantity'],
            'category_id' => $row['product_category']
        ]);
    }
}
