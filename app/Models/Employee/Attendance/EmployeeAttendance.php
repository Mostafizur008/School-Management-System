<?php

namespace App\Models\Employee\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\System\Result\Designation\Designation;

class EmployeeAttendance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'employee_id','id');
    }
    public function desi()
    {
        return $this->belongsTo(Designation::class,'designation_id','id');
    }
}
