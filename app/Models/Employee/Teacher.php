<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System\Result\Type\Type;
use App\Models\System\Result\Institution\Institution;
use App\Models\System\Result\Passing\Passing;
use App\Models\System\Result\Designation\Designation;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Teacher extends Model
{
    use HasRoles;

    public function type()
    {
        return $this->belongsTo(Type::class,'type_1','id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class,'institution_3','id');
    }

    public function passing()
    {
        return $this->belongsTo(passing::class,'passing_1','id');
    }

    public function tp()
    {
        return $this->belongsTo(Type::class,'type_2','id');
    }

    public function pass()
    {
        return $this->belongsTo(passing::class,'passing_2','id');
    }

    public function tpy()
    {
        return $this->belongsTo(Type::class,'type_3','id');
    }

    public function passi()
    {
        return $this->belongsTo(passing::class,'passing_3','id');
    }

    public function tpy1()
    {
        return $this->belongsTo(Type::class,'type_4','id');
    }

    public function passin()
    {
        return $this->belongsTo(passing::class,'passing_4','id');
    }

    public function ins()
    {
        return $this->belongsTo(Institution::class,'institution_4','id');
    }

    public function desi()
    {
        return $this->belongsTo(Designation::class,'designation_id','id');
    }
}
