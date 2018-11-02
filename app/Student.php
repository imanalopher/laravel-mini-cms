<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'sex',
        'address',
        'birthday',
        'class',
        'nfc',
        'photo',
        'school_id',
    ];

    /**
     * @return BelongsTo
     */
    public function school()
    {
        return $this->belongsTo(Schools::class);
    }
}
