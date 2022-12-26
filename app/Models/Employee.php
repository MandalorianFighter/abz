<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'hire_date',
        'phone',
        'email',
        'salary',
        'position_id',
        'manager_id',
        'photo',
        'admin_created_id',
        'admin_updated_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    

    public function manager()
    {
        return $this->belongsTo(self::class, 'manager_id', 'id');
    }

    public function subordinates()
    {
        return $this->hasMany(self::class, 'manager_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
