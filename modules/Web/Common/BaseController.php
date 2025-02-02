<?php

namespace BasicDashboard\Web\Common;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 *
 * A base controller for common method
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class BaseController extends Controller
{
    //Common View Used for Index and Edit
    public function returnView($viewPath, $data)
    {
        return view($viewPath, [
            'data' => $data,
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
    //Common Redirect Used for Store,Update and Destroy
    public function redirectRoute($routePath, $successMessage)
    {
        return to_route($routePath)->with([
            'message' => $successMessage,
            'responseType' => 'success',
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
    //Common Custom Error Exception For User
    public function redirectBackWithError($repo, $e)
    {
        $repo->rollBack();
        return redirect()->back()->with([
            'message' => $e->getMessage(),
            'responseType' => 'error',
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function redirectBackWithCustomError($repo, $e)
    {
        $repo->rollBack();
        return redirect()->back()->with([
            'message' => $e->messages(),
            'responseType' => 'error',
        ]);
    }

    public function captureMemory(): int
    {
        return memory_get_usage();
    }

    public function calculateMemory($startMemory, $endMemory): string
    {
        $memoryUsed = round(($endMemory - $startMemory) / 1048576, 2);
        $memoryUsed .= ' mb';
        return $memoryUsed;
    }

    public function captureTime(): string
    {
        return microtime(true);
    }

    public function calculateTime($startTime, $endTime): string
    {
        $time = $endTime - $startTime;
        $time .= ' sec';
        return $time;
    }

    public function generatePresignedUrl($count = 1, $filePath): array
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
    }

    public function sendAjaxError($message)
    {
        $response = [
            'code' => 400,
            'status' => "failed",
            'message' => $message,
        ];
        return response()->json($response, 500);
    }

    public function sendAjaxSuccess($message)
    {
        $response = [
            'code' => 200,
            'status' => "Success",
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
}
