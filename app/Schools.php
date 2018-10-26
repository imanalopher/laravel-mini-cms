<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schools extends Model
{
    /**
     * @return HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
