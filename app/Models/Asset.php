<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetsFactory> */
    use HasFactory;

    protected $guarded = [];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'employee_id');
    }

    public function userDepartment()
    {
        return $this->belongsTo(Department::class, 'id');
    }
}
