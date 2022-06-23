<?php

namespace App\Models\System\Dependance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System\Dependance\Country;

class District extends Model
{
    public function country_name()
    {
        return $this->belongsTo(Country::class, 'country_id','id');
    }
}
