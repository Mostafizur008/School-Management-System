<?php

namespace App\Models\Exam\StudentMarks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignStudent\AssignStudent;
use App\Models\Exam\AssignSubject\AssignSub;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use App\Models\Exam\Exam\StudentExam;
use App\Models\Setup\Subject\StudentSub;
use App\Models\Exam\StudentMarks\StudentMarks;


class StudentMarks extends Model
{
    public function st_name()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function assign_sub()
    {
        return $this->belongsTo(AssignSub::class,'assign_subject_id','id');
    }
    public function assign_student()
    {
        return $this->belongsTo(AssignStudent::class,'student_id','id');
    }

    public function session()
    {
        return $this->belongsTo(StudentSession::class,'session_id','id');
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function exam()
    {
        return $this->belongsTo(StudentExam::class,'exam_id','id');
    }
    public function st_sub()
    {
        return $this->belongsTo(StudentSub::class,'assign_subject_id','id');
    }
    public function shift()
    {
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }
}
