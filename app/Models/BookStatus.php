<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $status
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Book[] $books
 */
class BookStatus extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'book_statusses';

    /**
     * @var array
     */
    protected $fillable = ['status', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'book_status_id');
    }
}
