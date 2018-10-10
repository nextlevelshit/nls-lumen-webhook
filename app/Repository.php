<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $validRepositories;

    function __construct() {
        $this->validRepositories = explode(';', env('REPO_VALID_LIST'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'full_name', 'html_url'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'email',
    ];

    /**
     * Compare valid list with incoming repository.
     * 
     * @return boolean
     */

    public function isValid() 
    {
        return in_array($this->name, $this->validRepositories);
    }

    public function isNotValid()
    {
        return !$this->isValid();
    }
}
