<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';

    protected $fillable =['nombre','estado'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
