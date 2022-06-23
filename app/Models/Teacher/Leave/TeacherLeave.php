<?php

namespace App\Models\Teacher\Leave;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TeacherLeave extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }
    public function purpose()
    {
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id','id');
    }
}
