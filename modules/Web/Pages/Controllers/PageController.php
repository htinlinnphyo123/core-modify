<?php

namespace BasicDashboard\Web\Pages\Controllers;

use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Pages\Services\PageService;
use BasicDashboard\Web\Pages\Validation\StorePageRequest;
use BasicDashboard\Web\Pages\Validation\UpdatePageRequest;
use BasicDashboard\Web\Pages\Validation\DeletePageRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 *
 * A PageController is responsible for receive request and return response.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class PageController extends BaseController
{
    public function __construct(
        private PageService $pageService
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(Request $request): View
    {
        return $this->pageService->index($request->all());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        return $this->pageService->create();
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(StorePageRequest $request): JsonResponse
    {
        return $this->pageService->store($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        return $this->pageService->edit($id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): View | RedirectResponse
    {
        return $this->pageService->show($id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update(UpdatePageRequest $request, string $id): JsonResponse
    {
        return $this->pageService->update($request->all(), $id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy(DeletePageRequest $request): RedirectResponse
    {
        return $this->pageService->destroy($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}
