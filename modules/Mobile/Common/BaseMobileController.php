<?php

namespace BasicDashboard\Mobile\Common;

use App\Http\Controllers\Controller;

/**
 *
 * A base controller for common method
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class BaseMobileController extends Controller
{

    public function sendResponse(string $message, array $data = null)
    {
        $response = [
            'code' => 200,
            'status' => "success",
            'message' => $message,
        ];
        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function sendError(string $message)
    {
        $response = [
            'code' => 400,
            'status' => "failed",
            'message' => $message,
        ];
        return response()->json($response);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function sendNoDataResponse(string $message, array $data = null)
    {
        $response = [
            'code' => 404,
            'status' => "No Data Exist",
            'message' => $message,
        ];
        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }
    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function captureMemory(): int
    {
        return memory_get_usage();
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function calculateMemory(string $startMemory, string $endMemory): string
    {
        $memoryUsed = round(($endMemory - $startMemory) / 1048576, 2);
        $memoryUsed = $memoryUsed . ' mb';
        return $memoryUsed;
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function captureTime(): string
    {
        return microtime(true);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function calculateTime(string $startTime, string $endTime): string
    {
        $time = $endTime - $startTime;
        $time = $time . ' sec';
        return $time;
    }

}
