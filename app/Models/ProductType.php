<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class ProductType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
