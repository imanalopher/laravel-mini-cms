<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    /**
     * @return BelongsTo
     */
    public function school()
    {
        return $this->belongsTo(Schools::class);
    }
}
