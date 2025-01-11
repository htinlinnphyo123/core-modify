<?php

namespace BasicDashboard\Foundations\Domain\Pages;

use App\Observers\AuditObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BasicDashboard\Foundations\Domain\Users\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 *
 * A Page is gives a basic way to do that using Eloquent ORM where each table incorporates to interact with it.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */
//if you want to audit this model uncomment below code and import
//#[ObservedBy([AuditObserver::class])]
class Page extends Model
{
    use HasFactory, SoftDeletes;
    //protected $table = 'table_name';
    protected $guarded = [];

    protected $casts = [
        'link' => 'array',
        'is_published' => 'boolean',
        'is_banner' => 'boolean',
        'is_highlighed' => 'boolean',
    ];
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function writtenBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'written_by')->withDefault([
            'name' => '---'
        ]);
    }
}
