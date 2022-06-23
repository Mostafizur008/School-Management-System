<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use App\Models\System\Result\Type\Type;
use App\Models\System\Result\Institution\Institution;
use App\Models\System\Result\Passing\Passing;
use App\Models\System\Result\Designation\Designation;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

     ///////////////////////////////All type///////////////////////////////////////////

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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

        // GetRolePermission

        public static function getpermissionGroups()
        {
            $permission_groups = DB::table('permissions')
                ->select('group_name as name')
                ->groupBy('group_name')
                ->get();
            return $permission_groups;
        }
    
        public static function getpermissionsByGroupName($group_name)
        {
            $permissions = DB::table('permissions')
                ->select('name', 'id')
                ->where('group_name', $group_name)
                ->get();
            return $permissions;
        }
    
        public static function roleHasPermissions($role, $permissions)
        {
            $hasPermission = true;
            foreach ($permissions as $permission) {
                if (!$role->hasPermissionTo($permission->name)) {
                    $hasPermission = false;
                    return $hasPermission;
                }
            }
            return $hasPermission;
        }
}
