<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schools extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * @return HasMany
     */
    public function teachers()
    {
        return $this->hasMany(Teachers::class);
    }

    /**
     * @return HasMany
     */
    public function klasses()
    {
        return $this->hasMany(Klass::class);
    }
}
