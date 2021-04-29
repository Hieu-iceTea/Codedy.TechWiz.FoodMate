<?php

namespace App\Models;

use App\Scopes\DeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $perPage = 8;

    public  function products(){
        return $this->hasMany(Product::class, 'restaurant_id', 'id');
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
