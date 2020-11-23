<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    /**
     * Prevent Eloquent for accessing this fields
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Define Many-to-Many relationships with Book Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book');
    }
}
