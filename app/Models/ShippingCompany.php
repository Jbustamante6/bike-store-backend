<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $tracking_url
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Shipping[] $shippings
 */
class ShippingCompany extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'tracking_url', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }
}
