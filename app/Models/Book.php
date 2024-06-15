<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $purchaser_id
 * @property integer $book_status_id
 * @property integer $seller_id
 * @property integer $payment_method_id
 * @property string $book_date
 * @property mixed $details
 * @property string $delivery_date
 * @property string $return_date
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 * @property BookStatuss $bookStatuss
 * @property PaymentMethod $paymentMethod
 * @property User $user
 * @property User $user
 * @property Service[] $services
 */
class Book extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['purchaser_id', 'book_status_id', 'seller_id', 'payment_method_id', 'book_date', 'details', 'delivery_date', 'return_date', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'books_has_products');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookStatuss()
    {
        return $this->belongsTo('App\Models\BookStatuss', 'book_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'purchaser_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'seller_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'books_has_services');
    }
}
