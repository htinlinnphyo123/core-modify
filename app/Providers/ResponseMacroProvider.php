<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

/**
 * Extend Response macros.
 *
 * @method static View successView(string $path, array $data)
 * @method static RedirectResponse successIndexRedirect(string $indexRoute, string $message)
 */
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
        Response::macro('successView', function (string $path,array $data): View {
            return view($path,[
                'success' => true,
                'data' => $data,
            ]);
        });
        Response::macro('successIndexRedirect',function(string $model,string $message,string $index='index'): RedirectResponse{
            $indexRoute = "$model.$index";
            return to_route($indexRoute)->with([
                'message' => $message,
                'responseType' => 'success',
            ]);
        });
        Response::macro('successShowRedirect',function(string $model,string $id,string $message,string $show='show'): RedirectResponse{
            $showRoute = "$model.$show";
            return to_route($showRoute,$id)->with([
                'message' => $message,
                'responseType' => 'success',
            ]);
        });
        Response::macro('redirectBackWithError',function($repository,$message): RedirectResponse{
            $repository->rollBack();
            return redirect()->back()->with([
                'message' => $message,
                'responseType' => 'error',
            ]);
        });

        
    }
}
