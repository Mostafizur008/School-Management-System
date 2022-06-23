<?php

namespace App\Models\Employee\Leave;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EmployeeLeave extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'employee_id','id');
    }
    public function purpose()
    {
        return $this->belongsTo(EmployeeLeavePurpose::class,'employee_leave_purpose_id','id');
    }
}
