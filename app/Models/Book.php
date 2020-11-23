<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    /**
     * Define Many-to-Mane relationships with Author Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function author()
    {
       return $this->belongsToMany('App\Models\Author');
    }

}
