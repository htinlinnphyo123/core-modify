<?php

namespace BasicDashboard\Mobile\Categories\Controllers;

use BasicDashboard\Mobile\Categories\Services\CategoryService;
use BasicDashboard\Mobile\Categories\Validation\CategoryDetailRequest;
use BasicDashboard\Mobile\Common\BaseMobileController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 * A CategoryController is responsible for receive request and return response.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class CategoryController extends BaseMobileController
{
    public function __construct(
        private CategoryService $categoryService
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(Request $request): JsonResponse
    {
        return $this->categoryService->index($request->all());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function detail(CategoryDetailRequest $request): JsonResponse
    {
        return $this->categoryService->detail($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

}
