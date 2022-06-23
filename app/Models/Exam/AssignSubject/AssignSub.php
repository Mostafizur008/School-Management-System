<?php

namespace App\Models\Exam\AssignSubject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Subject\StudentSub;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Exam\Shortcode\ShortCode;
use App\Models\Exam\Exam\StudentExam;

class AssignSub extends Model
{
    public function class()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(StudentSub::class,'subject_id','id');
    }

    public function group()
    {
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function shortcode()
    {
        return $this->belongsTo(ShortCode::class,'shortcode_id','id');
    }

    public function exam()
    {
        return $this->belongsTo(StudentExam::class,'exam_id','id');
    }
}
