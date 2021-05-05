<?php

namespace App\Models;

use App\Scopes\DeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $perPage = 8;

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
    // * * * * * * * * * * * * * * * * * * * * Scopes * * * * * * * * * * * * * * * * * * * *

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        //Applying Global Scopes
        static::addGlobalScope(new DeletedScope());
    }
}
