<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRequestList extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productRequests()
    {
        return $this->hasMany('App\ProductRequest', 'list_id');
    }
}
