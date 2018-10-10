<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'full_name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'email',
    ];

    public function notAllowed() {
        return true;
    }
}
