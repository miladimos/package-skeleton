<?php

namespace Miladimos\Package\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTest extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'table';

    // protected $fillable = ['name'];

    protected $guarded = [];
}
