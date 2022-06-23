<?php

namespace App\Models\Category\FeeAmount;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\FeeCategory\FeeCategory;
use App\Models\Setup\Class\StudentClass;

class FeeAmount extends Model
{
    public function category()
    {
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }
    public function class()
    {
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
