<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Forms\Login\WebLoginRequest;
use App\Services\Authentication\AuthenticationService;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function __construct(private AuthenticationService $authenticationService)
    {
        $this->middleware('jwtAuth')->except('store');
    }

    /**
     * @OA\Post(
     *     path="/login",
     *     summary="Авторизация",
     *     description="",
     *     tags={"/login"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="Email",
     *                     property="email",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     description="Пароль",
     *                     property="password",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     description="Запомнить меня",
     *                     property="remember",
     *                     type="boolean",
     *                 ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Successful operation", @OA\MediaType(mediaType="application/json", @OA\Schema(type="object",
     *         @OA\Property(property="success", type="boolean", description="Результат выполнения", example=true),
     *         @OA\Property(property="data", type="array", description="Результат", @OA\Items(
     *           @OA\Property(property="token",
     *              type="string",
     *              default="1|9648b6339366e6d6dbcde54d6bdfc8eff5256979d329423d358d666cf6b8c93c", description="Токен авторизации")
     *           )
     *         ),
     *         @OA\Property(property="errors", type="array", description="Ошибки", @OA\Items()),
     *         @OA\Property(property="code", type="integer", description="Код ответа", example=200),
     *         @OA\Property(property="status", type="string", description="Текст статуса ответа", example="OK"),
     *     ))),
     * )
     */
    public function store(WebLoginRequest $request)
    {
        $authenticationServiceDto = $this->authenticationService->authentication($request);
        return $this->sendResponse($authenticationServiceDto)->withCookie($authenticationServiceDto->refreshCookie);
    }

    public function checkAuth(Request $request)
    {
        return $this->sendResponse([]);
    }

    public function refresh(Request $request)
    {
        $newAccessToken = $this->authenticationService->refreshAuthentication();

        return $this->sendResponse(['accessToken' => $newAccessToken]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        auth()->logout();

        return $this->sendResponse([]);
    }
}