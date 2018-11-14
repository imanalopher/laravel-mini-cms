<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schools extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'director_id'
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

    /**
     * @return BelongsTo
     */
    public function director()
    {
        return $this->belongsTo(Director::class);
    }


}
