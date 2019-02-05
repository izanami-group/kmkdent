<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'image'];

    /**
     * Default values for attributes.
     *
     * @var array
     */
    protected $attributes = ['image' => NULL];
}
