<?php

namespace App\Models;

use App\Scopes\DeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $perPage = 8;

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
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
