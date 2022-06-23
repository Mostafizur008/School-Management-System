<?php

namespace App\Models\Account\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AccountEmployeeSalary extends Model
{
    public function user(){
    	return $this->belongsTo(User::class,'employee_id','id');
    }
}
