<?php

namespace App\Models;

use App\Models\invoice;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(category::class , 'category_id');
    }

    public function invoice(){
        return $this->hasMany(invoice::class , 'product_id');
    }
}
