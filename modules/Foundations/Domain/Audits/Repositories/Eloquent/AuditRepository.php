<?php

namespace BasicDashboard\Foundations\Domain\Audits\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Audits\Audit;
use BasicDashboard\Foundations\Domain\Audits\Repositories\AuditRepositoryInterface;
use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 * A AuditRepository is includes extra function for implementing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class AuditRepository extends BaseRepository implements AuditRepositoryInterface
{
    public function __construct(Audit $model)
    {
        parent::__construct($model);
    }

    public function filterAudit(array $params): Builder | Audit
    {
        $connection = $this->connection()->with(['user']);
        if (isset($params['keyword']) && strlen($params['keyword']) > 0) {
            $connection = $connection->where('name', 'LIKE', '%' . $params['keyword'] . '%');
        }
        return $connection;
    }

    public function getAuditList($params): LengthAwarePaginator
    {
        return $this->filterAudit($params)
            ->orderByRaw('created_at DESC')
            ->orderBy('id', 'desc')
            ->paginate(20);
    }
}
