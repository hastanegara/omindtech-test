<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $keyType = 'string';
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    public $incrementing = false;

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
