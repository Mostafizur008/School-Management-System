<?php

namespace App\Models\Account\StudentFee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\FeeCategory\FeeCategory;
use App\Models\Student\DiscountStudent\DiscountStudent;
use App\Models\Category\FeeAmount\FeeAmount;
use App\Models\User;
use App\Models\Setup\Class\StudentClass;
use App\Models\Setup\Session\StudentSession;
use App\Models\Setup\Group\StudentGroup;
use App\Models\Setup\Shift\StudentShift;
use App\Models\Exam\Exam\StudentExam;

class StudentFee extends Model
{
    public function st_name()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function ds_name()
    {
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
    public function class_name()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function session_name()
    {
        return $this->belongsTo(StudentSession::class,'session_id','id');
    }
    public function group_name()
    {
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }
    public function shift_name()
    {
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }
    public function exam_name()
    {
        return $this->belongsTo(StudentExam::class,'exam_id','id');
    }
    public function fee_cat()
    {
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }
}
