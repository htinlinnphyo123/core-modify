<?php

namespace BasicDashboard\Foundations\Domain\Subcategories\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;
use BasicDashboard\Foundations\Domain\Subcategories\Repositories\SubcategoryRepositoryInterface;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 * A SubcategoryRepository is includes extra function for implementing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class SubcategoryRepository extends BaseRepository implements SubcategoryRepositoryInterface
{
    public function __construct(Subcategory $model)
    {
        parent::__construct($model);
    }

    public function filterSubcategory(array $params): Builder | Subcategory
    {
        $connection = $this->connection()->with('category');
        if (isset($params['keyword']) && strlen($params['keyword']) > 0) {
            $connection = $connection->where('name', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('name_other', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('description', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('description_other', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('category_id', 'LIKE', '%' . $params['keyword'] . '%');
        }
        return $connection;
    }

    public function getSubcategoryList($params): LengthAwarePaginator
    {
        return $this->filterSubcategory($params)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->orderBy('id', 'desc')
            ->paginate(request()->paginate ?? config('numbers.paginate'));
    }

    //Mobile Sections
    public function getSubcategories(array $request): Collection
    {
        $categoryId = isset($request['category_id']) ? customDecoder($request['category_id']) : null;
        return $this->connection(true)
            ->when($categoryId,function($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->get();
    }
}
