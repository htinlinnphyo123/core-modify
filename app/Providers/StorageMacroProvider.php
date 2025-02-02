<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class StorageMacroProvider extends ServiceProvider
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
        /**
         * Note This Generate Presigned Url Only Support S3 Object Storage
         */
        Storage::macro('generatePresignedUrl',function ($count = 1, $filePath): array
        {
            $links = [];
    
            for ($i = 0; $i < $count; $i++) {
                $path = $filePath . '/' . Str::random(15);
                $url = Storage::temporaryUploadUrl(
                    $path,
                    now()->addMinutes(20)
                );
                $links[] = [
                    'url' => $url,     // presigned URL
                    'path' => $path,   // path to be stored in the database
                ];
            }
    
            return $links;
        });
    }
}
