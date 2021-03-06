<?php

namespace MyBot\Models;

use Illuminate\Database\Eloquent\Model;
use MyBot\Traits\Escapable;
use Illuminate\Database\Eloquent\Builder;

/**
 * User
 *
 * @mixin Builder
 */
class User extends Model
{
    use Escapable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $guarded = [];

    protected $attributes = [
        'language' => 'farsi_persian',
        'local_language' => 'en'
    ];

    public function setLanguageAttribute($value)
    {
        $this->attributes['language'] = trim(strtolower($value));
    }

}
