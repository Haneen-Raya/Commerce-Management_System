<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['user_id', 'product_id'];


            public function product()
            {
                return $this->belongsTo(Product::class);
            }

            public function user()
            {
                return $this->belongsTo(User::class);

    }
}
