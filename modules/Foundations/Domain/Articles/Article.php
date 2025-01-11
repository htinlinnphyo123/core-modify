<?php

namespace BasicDashboard\Foundations\Domain\Articles;

use App\Observers\AuditObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BasicDashboard\Foundations\Domain\Users\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use BasicDashboard\Foundations\Domain\Categories\Category;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;

/**
 *
 * A Article is gives a basic way to do that using Eloquent ORM where each table incorporates to interact with it.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */
//if you want to audit this model uncomment below code and import
#[ObservedBy([AuditObserver::class])]
class Article extends Model
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class)->withDefault([
            'name' => '',
            'name_other' => '',
            'id' => ''
        ]);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function writtenBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'written_by')->withDefault([
            'name' => ''
        ]);
    }
}
