<?php 

namespace App\View\Composers;

use Illuminate\View\View;
use BasicDashboard\Foundations\Domain\Countries\Country;

class CountryComposer
{
    public function __construct()
    {
        //
    }
    public function compose(View $view)
    {
        $view->with('viewCountries', Country::pluck('name','id'));
    }
}