<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProposal extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productRequest()
    {
        return $this->belongsTo('App\ProductRequest');
    }

    public function assignedTo()
    {
        return $this->belongsTo('App\User', 'assigned_to_id');
    }
}
