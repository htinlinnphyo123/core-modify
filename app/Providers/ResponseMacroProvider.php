<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('successView', function (string $path,$data): View {
            return view($path,[
                'success' => true,
                'data' => $data,
            ]);
        });
        Response::macro('successIndexRedirect',function(string $indexRoute,string $message): RedirectResponse{
            return to_route($indexRoute)->with([
                'message' => $message,
                'responseType' => 'success',
            ]);
        });
    }
}
