<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * @OA\Info(
 *      version="_version_",
 *      title="DDD CMS",
 *      description="",
 * )
 *
 * @OA\Server(
 *      url=APP_URL,
 *      description="API Server"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @param array|object $data
     * @param int $code
     * @param array $headers
     * @return JsonResponse
     */
    public function sendResponse(array|object $data = [], int $code = Response::HTTP_OK, array $headers = []): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $data,
            'errors' => [],
            'code' => $code,
            'status' => Response::$statusTexts[$code],
        ];

        return response()->json($response, $code, $headers);
    }

    /**
     * @param array $errors
     * @param int $code
     * @param array $headers
     * @return JsonResponse
     */
    public function sendError(array $errors, int $code = Response::HTTP_INTERNAL_SERVER_ERROR, array $headers = []): JsonResponse
    {
        $response = [
            'success' => false,
            'data' => null,
            'errors' => $errors,
            'code' => $code,
            'status' => Response::$statusTexts[$code],
        ];

        return response()->json($response, $code, $headers);
    }

    /**
     * @param int $code
     * @return JsonResponse
     */
    public function sendInternalError(int $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return $this->sendError(['message' => 'Internal server error.'], $code);
    }

    public function sendException(Throwable $exception): JsonResponse
    {
        $response = [
            'success' => false,
            'data' => null,
            'errors' => [
                'message' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
                'trace' => $exception->getTraceAsString(),
            ],
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'status' => Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR],
        ];

        return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR, []);
    }
}
