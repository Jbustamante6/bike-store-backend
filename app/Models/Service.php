<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $service_type_id
 * @property string $name
 * @property string $description
 * @property mixed $properties
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property ServiceType $serviceType
 * @property Book[] $books
 */
class Service extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['service_type_id', 'name', 'description', 'properties', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serviceType()
    {
        return $this->belongsTo('App\Models\ServiceType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'books_has_services');
    }
}
