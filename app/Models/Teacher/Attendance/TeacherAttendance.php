<?php

namespace App\Models\Teacher\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\System\Result\Designation\Designation;

class TeacherAttendance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }
    public function desi()
    {
        return $this->belongsTo(Designation::class,'designation_id','id');
    }
}
