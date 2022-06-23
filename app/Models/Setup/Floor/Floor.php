<?php

namespace App\Models\Setup\Floor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setup\Building\Building;

class Floor extends Model
{
    use HasFactory;

    public function building()
    {
        return $this->belongsTo(Building::class,'building_id','id');
    }
}
