<?php

namespace App\Exceptions;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    private Controller $baseController;

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->baseController = new Controller();

        $this->renderable(function(AuthenticationException $e){
            return $this->baseController->sendError([$e->getMessage()], 401);
        });

        $this->renderable(function (Throwable $e) {
            return $this->baseController->sendException($e);
        });

    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Validation\ValidationException $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $code = $exception->status;
        $headers = [];
        $baseController = new Controller();
        return $baseController->sendError($exception->errors(), $code, $headers);
    }

}
