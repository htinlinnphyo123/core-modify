<?php

namespace BasicDashboard\Foundations\Domain\Audits;

use BasicDashboard\Foundations\Domain\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * A Audit is gives a basic way to do that using Eloquent ORM where each table incorporates to interact with it.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class Audit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'audits';
    public $timestamps = false;
    protected $guarded = [
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault([
            'name' => '---',
        ]);
    }

}
