<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @property integer $id
 * @property integer $product_type_id
 * @property integer $product_status_id
 * @property string $name
 * @property string $sku
 * @property integer $existences
 * @property mixed $properties
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Book[] $books
 * @property Purchase[] $purchases
 * @property ProductStatus $productStatus
 * @property ProductType $productType
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_type_id', 'product_status_id', 'name', 'sku', 'existences', 'properties', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'books_has_products');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function purchases()
    {
        return $this->belongsToMany('App\Models\Purchase', 'purchases_has_products');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productStatus()
    {
        return $this->belongsTo('App\Models\ProductStatus', 'product_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }
}
