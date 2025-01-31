<?php
namespace BasicDashboard\Foundations\Domain\Users;

use App\Observers\AuditObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[ObservedBy([AuditObserver::class])]
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $fillable = [
        "name",
        "email",
        "password",
        "status",
        "role_id",
        "name_other",
        "phone",
        "id_number",
        "date_of_birth",
        "father_name",
        "father_name_other",
        "gender",
        "martial_status",
        "education_status",
        "occupation",
        "created_at",
        "updated_at",
        "deleted_at",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

}
