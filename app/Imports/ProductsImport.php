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
            'name' => $row['name'],
            'desc' => $row['description'],
            'price' => $row['price'],
            'status' => $row['status'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category']
        ]);
    }
}
