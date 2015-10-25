<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedList extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'list';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','order'];
}
