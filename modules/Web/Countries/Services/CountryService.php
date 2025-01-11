<?php

namespace BasicDashboard\Web\Countries\Services;

use BasicDashboard\Foundations\Domain\Countries\Repositories\CountryRepositoryInterface;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Countries\Resources\CountryResource;
use BasicDashboard\Web\Currencies\Resources\CurrencyResource;
use BasicDashboard\Foundations\Domain\Currencies\Repositories\CurrencyRepositoryInterface;

/**
 *
 * A CountryService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class CountryService extends BaseController
{
    const VIEW = 'admin.country';
    const ROUTE = 'countries';
    const LANG_PATH = "country.country";

    public function __construct(
        private CountryRepositoryInterface $countryRepository,
        private CurrencyRepositoryInterface $currencyRepository
    ) {}

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): View
    {
        $countryList = $this->countryRepository->getCountryList($request);
        $countryList = CountryResource::collection($countryList)->response()->getData(true);
        return $this->returnView(self::VIEW . ".index", $countryList, $request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        return view(self::VIEW . '.create');
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store($request): RedirectResponse
    {
        try {
            $this->countryRepository->beginTransaction();
            $this->countryRepository->insert($request);
            $this->countryRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_created'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->countryRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $country = $this->countryRepository->edit($id);
        $country = new CountryResource($country);
        $country = $country->response()->getData(true)['data'];

        // $currencyList = $this->currencyRepository->getCurrencyList($id);
        // $currencyList = CurrencyResource::collection($currencyList)->response()->getData(true);
        // return $this->returnView(self::VIEW . ".edit", $country, $currencyList);

        return $this->returnView(self::VIEW . ".edit", $country);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id, $request): View | RedirectResponse
    {

        $country_id = customDecoder($id);

        $country = $this->countryRepository->show($id);
        $country = new CountryResource($country);
        $country = $country->response()->getData(true)['data'];

        $currencyList = $this->currencyRepository->getCurrencyList($request, $country_id);
        $currencyList = CurrencyResource::collection($currencyList)->response()->getData(true);
        $data = [
            'country' => $country,
            'currencyList' => $currencyList,
            'country_id' => $country_id,
        ];

        return $this->returnView(self::VIEW . '.show', $data, $request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update($request, string $id): RedirectResponse
    {
        try {
            $this->countryRepository->beginTransaction();
            $this->countryRepository->update($request, $id);
            $this->countryRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_updated'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->countryRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request): RedirectResponse
    {
        try {
            $this->countryRepository->beginTransaction();
            $this->countryRepository->delete($request['id']);
            $this->countryRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_deleted'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->countryRepository, $e);
        }
    }
}
