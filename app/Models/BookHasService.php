<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $book_id
 * @property integer $service_id
 * @property Book $book
 * @property Service $service
 */
class BookHasService extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'books_has_services';

    /**
     * @var array
     */
    protected $fillable = ['book_id', 'service_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
