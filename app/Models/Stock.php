<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $primaryKey = 'stock_id';

    public function products(){
        return $this->belongsTo(Product::class);
    }

    protected $fillable = ['stock_id', 'stock_name'];
}
