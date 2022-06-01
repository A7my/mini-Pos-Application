<?php

namespace App\Models;

use App\Models\product;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoice extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(category::class , 'category_id');
    }

    public function product(){
        return $this->belongsTo(product::class , 'product_id');
    }
}
