<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $guarded = [];

    // PARENT
    public function departmentName()
    {
        return $this->hasOne(Department::class, 'id', 'department_id')->select('name');
    }

    // CHILD
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
