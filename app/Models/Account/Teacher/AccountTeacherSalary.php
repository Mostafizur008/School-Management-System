<?php

namespace App\Models\Account\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AccountTeacherSalary extends Model
{
    public function user(){
    	return $this->belongsTo(User::class,'teacher_id','id');
    }
}
