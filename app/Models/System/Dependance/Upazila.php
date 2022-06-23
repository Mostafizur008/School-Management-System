<?php

namespace App\Models\System\Dependance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System\Dependance\District;

class Upazila extends Model
{
    public function district_name()
    {
        return $this->belongsTo(District::class, 'district_id','id');
    }
}
