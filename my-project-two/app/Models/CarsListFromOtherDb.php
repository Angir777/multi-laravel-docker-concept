<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarsListFromOtherDb extends Model
{
    use SoftDeletes;

    protected $connection = 'mysqlProjectOne';
    protected $table = 'cars_lists';

    public function __construct(array $attributes = [])
    {
        $this->table = 'my_project_one.' . $this->table;
        parent::__construct($attributes);
    }
}
