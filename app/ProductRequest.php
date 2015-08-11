<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    //

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
    public function productRequestList()
    {
        return $this->belongsTo('App\ProductRequestList', 'list_id');
    }

    public function proposals()
    {
        return $this->hasMany('App\ProductProposal');
    }
}
