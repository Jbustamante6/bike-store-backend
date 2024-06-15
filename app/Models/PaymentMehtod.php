<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Book[] $books
 * @property Purchase[] $purchases
 */
class PaymentMehtod extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_methods';

    /**
     * @var array
     */
    protected $fillable = ['name', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
