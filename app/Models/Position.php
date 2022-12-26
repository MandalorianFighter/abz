<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'admin_created_id',
        'admin_updated_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function employees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'id');
    }
}
