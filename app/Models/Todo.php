<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'description',
        'confirmed',
        'password',
        'user_id',
    ];

    public function getRouteKeyName(): string
    {
        return 'id';
    }

}
